<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 08/01/2026, 19:40
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
use Symfony\Bundle\FrameworkBundle\KernelBrowser;

class ContactCrudControllerTest extends AbstractCrudTestCase
{
	protected static function createClient (array $options = [], array $server = []): KernelBrowser
	{
		return parent::createClient(array_merge($options, ['environment' => 'crud']), $server);
	}

	protected function getControllerFqcn (): string
	{
		return ContactCrudController::class;
	}

	protected function getDashboardFqcn (): string
	{
		return DashboardController::class;
	}

	public function testIndexPage ()
	{
		$this->client->request('GET', $this->generateIndexUrl());

		$this->assertResponseIsSuccessful();
	}
}
