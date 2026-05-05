<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 15:19
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    maker.php
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

return static function (ContainerConfigurator $container): void {
	$container->extension('maker', [
		'root_namespace' => (new ReflectionClass(IdmCommonBundle::class))->getNamespaceName(),
	]);
};
