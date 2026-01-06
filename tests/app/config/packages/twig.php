<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:23
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    twig.php
 * @date    06/11/2025
 * @time    15:48
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.5.0
 */

use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container) {
	$container->extension('twig', [
		'default_path'      => dirname(__DIR__, 2) . '/templates',
		'file_name_pattern' => '*.twig',
	]);
};
