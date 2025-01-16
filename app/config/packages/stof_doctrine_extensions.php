<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 16/01/2025, 21:21
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    stof_doctrine_extensions.php
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
	$container->extension('stof_doctrine_extensions', [
		'default_locale'       => '%kernel.default_locale%',
		'translation_fallback' => true,
		'orm'                  => [
			# Activate the extensions you want
			'default' => [
				'translatable'        => false,
				'timestampable'       => false,
				'blameable'           => false,
				'sluggable'           => false,
				'tree'                => false,
				'loggable'            => false,
				'sortable'            => false,
				'softdeleteable'      => false,
				'uploadable'          => false,
				'reference_integrity' => false,
			],
		],
	]);
};
