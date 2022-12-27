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

namespace Idm\Bundle\Common\Tests\Pattern\Tool;

use Idm\Bundle\Common\Pattern\Tool\VersionTrait;
use PHPUnit\Framework\TestCase;

class VersionTraitTest extends TestCase
{
    public function testValidIntVersion(): void
    {
        $check = new VersionCheck();

        $this->assertEquals(100000000, $check->convertVersionToInt('1.0.0'));

        $this->assertEquals(200100005, $check->convertVersionToInt('2.10.5'));

        $this->assertEquals(500030010, $check->convertVersionToInt('5.3.10'));

        $this->assertEquals(1002696987, $check->convertVersionToInt('10.269.6987'));

        $this->assertEquals(1890785, $check->convertVersionToInt('0.189.785'));
    }

    // public function testInvalidIntVersion(): void
    // {

    // }

    public function testValidStringVersion(): void
    {
        $check = new VersionCheck();

        $this->assertEquals('1.0.0', $check->convertVersionToString(100000000));

        $this->assertEquals('2.10.5', $check->convertVersionToString(200100005));

        $this->assertEquals('5.3.10', $check->convertVersionToString(500030010));

        $this->assertEquals('10.269.6987', $check->convertVersionToString(1002696987));

        $this->assertEquals('0.189.785', $check->convertVersionToString(1890785));

    }

    // public function testInvalidStringVersion(): void
    // {

    // }
}

class VersionCheck
{
    use VersionTrait;
}
