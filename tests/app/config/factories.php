<?php
/**
 * Copyright 2024-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:14
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    factories.php
 * @date    16/01/2025
 * @time    20:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container, ContainerBuilder $builder) {
	// @formatter:off
	$container
		->services()
			->load('Factory\\', $builder->getParameter('kernel.project_dir'). '/tests/Factory')
			->public()
			->autowire()
			->autoconfigure()
	;
	// @formatter:on
};
