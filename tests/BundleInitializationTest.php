<?php

/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 18:25
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

declare(strict_types=1);

namespace Idm\Bundle\Common\Tests;

use App\Kernel;
use Idm\Bundle\Common\Decorator\Session\SessionFactory;
use Idm\Bundle\Common\Decorator\Twig\AppVariable;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

final class BundleInitializationTest extends KernelTestCase
{
	use CreateKernelCaseTrait;

	public function testInitBundle(): void
	{
		// Boot the kernel.
		$kernel = self::bootKernel([
			'config' => static function (Kernel $kernel): void {
//				$kernel->addExtraBundle(BundleName::class);
//				$kernel->addExtraConfig('path/to/file.php');
//				$kernel->addExtraConfig(['extension_name' => ['key_1' => 'value_1']);
//				$kernel->addExtraRoutesFile('path/to/file.php');
			},
		]);

		$this->assertTrue($kernel->getContainer()->has('kernel'));

		$removedIds = $kernel->getContainer()->getRemovedIds();

		$this->assertFalse(isset($removedIds[SessionFactory::class]));
		$this->assertFalse(isset($removedIds[AppVariable::class]));
	}

	public function testInitBundleWithNotifications(): void
	{
		$kernel = self::bootKernel([
			'config' => static function (Kernel $kernel): void {
				$kernel->addExtraConfig([
					'idm_common' => [
						'notifications_bag' => true,
					],
				]);
			},
		]);

		$removedIds = $kernel->getContainer()->getRemovedIds();

		$this->assertTrue(isset($removedIds[SessionFactory::class]));
		$this->assertTrue(isset($removedIds[AppVariable::class]));
	}
}
