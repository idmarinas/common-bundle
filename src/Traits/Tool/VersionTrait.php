<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 15:18
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    VersionTrait.php
 * @date    13/04/2023
 * @time    16:35
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.3.0
 */

namespace Idm\Bundle\Common\Traits\Tool;

trait VersionTrait
{
	/** Convert int version like 100000000 to 1.0.0 */
	public function convertVersionToString(int $version): string
	{
		$version = (string)$version;

		$path = (int)substr($version, -4);
		$version = substr_replace($version, '', -4);
		$minor = (int)substr($version, -4);
		$version = substr_replace($version, '', -4);
		$major = (int)substr($version, -4);

		return sprintf('%d.%d.%d', $major, $minor, $path);
	}

	/** Convert string version like 1.0.0 to 100000000 */
	public function convertVersionToInt(string $version): int
	{
		$matches = $this->versionDetails($version);

		$major = str_pad((string)$matches['major'], 4, 0, STR_PAD_LEFT);
		$minor = str_pad((string)$matches['minor'], 4, 0, STR_PAD_LEFT);
		$patch = str_pad((string)$matches['patch'], 4, 0, STR_PAD_LEFT);

		return (int)($major.$minor.$patch);
	}

	/**
	 * Convert a string version in an array of details.
	 *
	 * @param string $version Version string like "1.0.0"
	 *
	 * @return array <code>['major', 'minor', 'patch', 'prerelease', 'buildmetadata']</code>
	 */
	public function versionDetails(string $version): array
	{
		$re = '^(?P<major>0|[1-9]\d*)\.(?P<minor>0|[1-9]\d*)\.(?P<patch>0|[1-9]\d*)(?:-(?P<prerelease>(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*)(?:\.(?:0|[1-9]\d*|\d*[a-zA-Z-][0-9a-zA-Z-]*))*))?(?:\+(?P<buildmetadata>[0-9a-zA-Z-]+(?:\.[0-9a-zA-Z-]+)*))?$';

		preg_match_all(sprintf('/%s/m', $re), $version, $matches, PREG_SET_ORDER, 0);

		return array_filter($matches[0], fn($k) => !is_numeric($k), ARRAY_FILTER_USE_KEY);
	}
}
