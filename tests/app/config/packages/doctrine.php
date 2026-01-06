<?php
/**
 * Copyright 2024-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:21
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    doctrine.php
 * @date    16/01/2025
 * @time    20:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Idm\Bundle\Common\IdmCommonBundle;
use ReflectionClass;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\Filesystem\Filesystem;
use function Symfony\Component\String\u;

return static function (ContainerConfigurator $container, ContainerBuilder $builder) {
	$getDatabaseCache = function (string $projectDir, string $env): string {
		$dir = $projectDir . '/var/cache/database';

		$filesystem = new Filesystem();

		if (!$filesystem->exists($dir)) {
			$filesystem->mkdir($dir);
		}

		$dbName = (new ReflectionClass(IdmCommonBundle::class))->getShortName();
		$dbName = u($dbName)->snake()->toString();

		return sprintf('sqlite:///%s/%s_%s.sqlite', $dir, $dbName, $env);
	};

	$container->extension('doctrine', [
		'dbal' => [
			'driver' => 'pdo_sqlite',
			'url'    => $getDatabaseCache($builder->getParameter('kernel.project_dir'), $container->env()),
		],
		'orm'  => [
			'auto_mapping'        => false,
			'controller_resolver' => [
				'auto_mapping' => false,
			],
			'mappings'            => [
				'Tests' => [
					'is_bundle' => false,
					'mapping'   => true,
					'type'      => 'attribute',
					'dir'       => dirname(__DIR__, 2) . '/src/Entity',
					'prefix'    => 'App\Entity',
				],
			],
			//'resolve_target_entities' => [
			//	AbstractUser::class => User::class,
			//],
		],
	]);
};
