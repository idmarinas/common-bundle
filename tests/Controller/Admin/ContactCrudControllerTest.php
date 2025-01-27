<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/01/2025, 21:16
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactCrudControllerTest.php
 * @date    27/01/2025
 * @time    18:45
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Idm\Bundle\Common\Tests\Controller\Admin;

use App\Controller\Admin\ContactCrudController;
use App\Controller\Admin\DashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Test\AbstractCrudTestCase;

class ContactCrudControllerTest extends AbstractCrudTestCase
{
	public function testIndexPage ()
	{
		$this->client->request('GET', $this->generateIndexUrl());

		$this->assertResponseIsSuccessful();
	}

	protected function getControllerFqcn (): string
	{
		return ContactCrudController::class;
	}

	protected function getDashboardFqcn (): string
	{
		return DashboardController::class;
	}
}
