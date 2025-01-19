<?php
/**
 * Copyright 2022-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/01/2025, 19:32
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    IdmCommonBundle.php
 * @date    14/08/2022
 * @time    18:01
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

namespace Idm\Bundle\Common;

use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Bundle\AbstractBundle;

final class IdmCommonBundle extends AbstractBundle
{
	public function loadExtension (array $config, ContainerConfigurator $container, ContainerBuilder $builder): void
	{
		$container->import(dirname(__DIR__) . '/config/services.php');
	}
}
