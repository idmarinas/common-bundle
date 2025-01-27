<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/01/2025, 19:48
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    services.php
 * @date    16/01/2025
 * @time    20:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Controller\Admin\ContactCrudController;
use App\Controller\Admin\DashboardController;
use App\Controller\ContactController;
use App\Repository\ContactRepository;
use Doctrine\Persistence\ManagerRegistry;

return static function (ContainerConfigurator $container) {
	// @formatter:off
	$container
		->services()
			->set(ContactRepository::class)
				->public()
				->args([service(ManagerRegistry::class)])
				->tag('doctrine.repository_service')

			->set(ContactController::class)->public()->autoconfigure()->autowire()
			->set(DashboardController::class)->public()->autoconfigure()->autowire()
			->set(ContactCrudController::class)->public()->autoconfigure()->autowire()
	;
	// @formatter:on
};
