<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 24/02/2025, 18:38
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    framework.php
 * @date    16/01/2025
 * @time    20:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
	$container->extension('framework', [
		'secret'                => 'test',
		'test'                  => true,
		'http_method_override'  => false,
		'handle_all_throwables' => true,
		'php_errors'            => [
			'log' => true,
		],
		'csrf_protection'       => true,
		'form'                  => true,
		'assets'                => true,
	]);
};
