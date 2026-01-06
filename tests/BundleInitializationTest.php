<?php

/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:11
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    BundleInitializationTest.php
 * @date    22/01/2025
 * @time    12:23
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Idm\Bundle\Common\Tests;

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class BundleInitializationTest extends KernelTestCase
{
	use CreateKernelCaseTrait;

	public function testInitBundle (): void
	{
		// Boot the kernel.
		$kernel = self::bootKernel([
			'config' => static function (Kernel $kernel) {
//				$kernel->addExtraBundle(BundleName::class);
//				$kernel->addExtraConfig('path/to/file.php');
//				$kernel->addExtraConfig(['extension_name' => ['key_1' => 'value_1']);
//				$kernel->addExtraRoutesFile('path/to/file.php');
			},
		]);

		$this->assertTrue($kernel->getContainer()->has('kernel'));
	}
}
