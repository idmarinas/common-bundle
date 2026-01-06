<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:22
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    easy_admin.php
 * @date    23/03/2025
 * @time    21:18
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.5.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

return static function (ContainerConfigurator $container) {
	$container->extension('framework', [
		'forms'  => true,
		'assets' => true,
		'router' => [
			'utf8' => true,
		],
	]);
};
