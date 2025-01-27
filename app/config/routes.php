<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/01/2025, 20:51
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    routes.php
 * @date    23/01/2025
 * @time    17:08
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

use App\Controller\Admin\DashboardController;
use App\Controller\ContactController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
	// @formatter:off
	$routes
		->import(ContactController::class, 'attribute')
			->namePrefix('idm_common_')
	;
	$routes
		->import(DashboardController::class, 'attribute')
			->namePrefix('idm_admin_')
	;
	// @formatter:on
};
