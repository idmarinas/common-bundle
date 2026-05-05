<?php
/**
 * Copyright $originalComment.match("Copyright (\d+)", 1, "-",$today.year)2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 10:21
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    fixtures.php
 * @date    16/01/2025
 * @time    20:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

use Idm\Bundle\Common\IdmCommonBundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;

return static function (ContainerConfigurator $container, ContainerBuilder $builder) {
	$namespace = (new ReflectionClass(IdmCommonBundle::class))->getNamespaceName();
	// @formatter:off
	$container
		->services()
			->load($namespace.'\\Tests\\DataFixtures\\', $builder->getParameter('kernel.project_dir') . '/tests/DataFixtures')
			->public()
			->autowire()
			->autoconfigure()
	;
	// @formatter:on
};
