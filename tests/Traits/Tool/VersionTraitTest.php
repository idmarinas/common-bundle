<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 15:20
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    VersionTraitTest.php
 * @date    05/05/2026
 * @time    15:26
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

declare(strict_types=1);

/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2025, 21:35
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    VersionTraitTest.php
 * @date    23/01/2025
 * @time    21:19
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */
/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see     https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since   1.3.0
 */

namespace Idm\Bundle\Common\Tests\Traits\Tool;

use Idm\Bundle\Common\Traits\Tool\VersionTrait;
use PHPUnit\Framework\TestCase;

final class VersionTraitTest extends TestCase
{
	public function testValidIntVersion(): void
	{
		$check = new VersionCheck();

		$this->assertSame(1_0000_0000, $check->convertVersionToInt('1.0.0'));

		$this->assertSame(2_0010_0005, $check->convertVersionToInt('2.10.5'));

		$this->assertSame(5_0003_0010, $check->convertVersionToInt('5.3.10'));

		$this->assertSame(10_0269_6987, $check->convertVersionToInt('10.269.6987'));

		$this->assertSame(189_0785, $check->convertVersionToInt('0.189.785'));

		$version = [
			'major'         => '1',
			'minor'         => '0',
			'patch'         => '0',
			'prerelease'    => 'alpha',
			'buildmetadata' => 'beta',
		];

		$this->assertSame($version, $check->versionDetails('1.0.0-alpha+beta'));
	}

	// public function testInvalidIntVersion(): void
	// {

	// }

	public function testValidStringVersion(): void
	{
		$check = new VersionCheck();

		$this->assertSame('1.0.0', $check->convertVersionToString(1_0000_0000));

		$this->assertSame('2.10.5', $check->convertVersionToString(2_0010_0005));

		$this->assertSame('5.3.10', $check->convertVersionToString(5_0003_0010));

		$this->assertSame('10.269.6987', $check->convertVersionToString(10_0269_6987));

		$this->assertSame('0.189.785', $check->convertVersionToString(189_0785));
	}

	// public function testInvalidStringVersion(): void
	// {

	// }
}

class VersionCheck
{
	use VersionTrait;
}
