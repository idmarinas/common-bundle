<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2025, 20:15
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactRepositoryTest.php
 * @date    23/01/2025
 * @time    20:09
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Idm\Bundle\Common\Tests\Repository;

use App\Repository\ContactRepository;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

class ContactRepositoryTest extends KernelTestCase
{
	public function testCountEmptyEmail ()
	{
		$kernel = static::createKernel();
		$container = static::getContainer();
		$repository = $container->get(ContactRepository::class);

		$count = $repository->countEmptyEmail();

		$this->assertEquals(50, $count);
	}
}
