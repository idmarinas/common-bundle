<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since 1.3.0
 */

namespace Idm\Bundle\Common\Traits\Tool;

use vierbergenlars\SemVer\version;

trait VersionTrait
{
    /** Conver int version like 100000000 to 1.0.0 */
    public function convertVersionToString(int $version): string
    {
        $version = (string) $version;

        $path    = (int) substr($version, -4);
        $version = substr_replace($version, '', -4);
        $minor   = (int) substr($version, -4);
        $version = substr_replace($version, '', -4);
        $major   = (int) substr($version, -4);

        return "{$major}.{$minor}.{$path}";
    }

    /** Convert string version like 1.0.0 to 100000000 */
    public function convertVersionToInt(string $version)
    {
        $re = '/^(?P<major>0|[1-9]\d*)\.(?P<minor>0|[1-9]\d*)\.(?P<patch>0|[1-9]\d*)(?:-(?P<prerelease>(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\+(?P<buildmetadata>[0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$/m';

        preg_match_all($re, $version, $matches, PREG_SET_ORDER, 0);
        $matches = $matches[0];

        return (int) (
            str_pad($matches['major'], 4, 0, STR_PAD_LEFT)
            .str_pad($matches['minor'], 4, 0, STR_PAD_LEFT)
            .str_pad($matches['patch'], 4, 0, STR_PAD_LEFT)
        );
    }
}
