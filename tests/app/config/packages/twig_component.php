<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 15:19
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    twig_component.php
 * @date    27/01/2025
 * @time    20:11
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container): void {
	$container->extension('twig_component', [
		'anonymous_template_directory' => dirname(__DIR__, 2).'/components/',
		'defaults'                     => [
			# Namespace & directory for components
			'App\\Twig\\Components\\' => 'components/',
		],
	]);
};
