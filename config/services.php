<?php
/**
 * Copyright 2022-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/01/2025, 21:35
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    services.php
 * @date    14/08/2022
 * @time    18:01
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.0.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Idm\Bundle\Common\Command\GenerateCryptoValueCommand;
use Idm\Bundle\Common\Command\OpcacheClearCommand;

return function (ContainerConfigurator $container) {
	// @formatter:off
	$container->services()
		->set('idm_common.command.generate.cryptographically', GenerateCryptoValueCommand::class)
			->tag('console.command')
		->set('idm_common.command.opcache.clear', OpcacheClearCommand::class)
			->tag('console.command')
	;
	// @formatter::on
};
