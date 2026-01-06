<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:33
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
use Symfony\Bundle\FrameworkBundle\Controller\TemplateController;
use Symfony\Component\Routing\Loader\Configurator\RoutingConfigurator;

return function (RoutingConfigurator $routes) {
	// @formatter:off
//	$routes->import('routes/web_profiler.php');

	//$routes->import('security.route_loader.logout', 'service')->methods(['GET']);

	$routes
		->import(ContactController::class, 'attribute')
		->namePrefix('idm_common_')
	;
	$routes
		->import(DashboardController::class, 'attribute')
		->namePrefix('idm_admin_')
	;
	$routes->add('app_home', '/')
		->controller(TemplateController::class)
		->methods(['GET'])
		->defaults(['template' => 'pages/home.html.twig'])
		->options([
			'seo' => true
		])
	;
	// @formatter:on
};
