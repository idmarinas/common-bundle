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

namespace Idm\Bundle\Common\Tests\Traits\Tool;

use Idm\Bundle\Common\Traits\Tool\VersionTrait;
use PHPUnit\Framework\TestCase;

class VersionTraitTest extends TestCase
{
    public function testValidIntVersion(): void
    {
        $check = new VersionCheck();

        $this->assertEquals(1_0000_0000, $check->convertVersionToInt('1.0.0'));

        $this->assertEquals(2_0010_0005, $check->convertVersionToInt('2.10.5'));

        $this->assertEquals(5_0003_0010, $check->convertVersionToInt('5.3.10'));

        $this->assertEquals(10_0269_6987, $check->convertVersionToInt('10.269.6987'));

        $this->assertEquals(189_0785, $check->convertVersionToInt('0.189.785'));
    }

    // public function testInvalidIntVersion(): void
    // {

    // }

    public function testValidStringVersion(): void
    {
        $check = new VersionCheck();

        $this->assertEquals('1.0.0', $check->convertVersionToString(1_0000_0000));

        $this->assertEquals('2.10.5', $check->convertVersionToString(2_0010_0005));

        $this->assertEquals('5.3.10', $check->convertVersionToString(5_0003_0010));

        $this->assertEquals('10.269.6987', $check->convertVersionToString(10_0269_6987));

        $this->assertEquals('0.189.785', $check->convertVersionToString(189_0785));

    }

    // public function testInvalidStringVersion(): void
    // {

    // }
}

class VersionCheck
{
    use VersionTrait;
}
