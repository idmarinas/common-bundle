<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 15:24
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    notifications.php
 * @date    05/05/2026
 * @time    10:27
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Idm\Bundle\Common\Decorator\Session\SessionFactory;
use Idm\Bundle\Common\Decorator\Twig\AppVariable;

return function (ContainerConfigurator $container): void {
	// @formatter:off
	$container->services()
		->set('idm_common.notifications.factory', SessionFactory::class)
			->decorate('session.factory')
			->args([service('.inner')])
		->set('idm_common.notifications.twig.factory', AppVariable::class
			->decorate('twig.app_variable')
			->args([service('.inner')]))
	;
};
