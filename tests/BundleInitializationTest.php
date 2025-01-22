<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/01/2025, 12:23
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

/**
 * This file is part of Bundle "IDM Advertising Bundle".
 *
 * @see     https://github.com/idmarinas/advertising-bundle
 *
 * @license https://github.com/idmarinas/advertising-bundle/blob/master/LICENSE.txt
 * @author  IDMarinas
 *
 * @since   0.1.0
 */

namespace Idm\Bundle\Common\Tests;

use App\Kernel;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\HttpKernel\KernelInterface;

class BundleInitializationTest extends KernelTestCase
{

	protected static function createKernel (array $options = []): KernelInterface
	{
		/** @var Kernel $kernel */
		$kernel = parent::createKernel($options);
		$kernel->handleOptions($options);

		return $kernel;
	}

	public function testInitBundle (): void
	{
		// Boot the kernel.
		self::bootKernel();

		$this->assertTrue(true);
	}

	// public function testBundleWithDifferentConfiguration(): void
	// {
	//     // Boot the kernel with a config closure, the handleOptions call in createKernel is important for that to work
	//     $kernel = self::bootKernel(['config' => static function(TestKernel $kernel){
	//         // Add some other bundles we depend on
	//         $kernel->addTestBundle(OtherBundle::class);

	//         // Add some configuration
	//         $kernel->addTestConfig(__DIR__.'/config.yml');
	//     }]);

	//     // ...
	// }
}
