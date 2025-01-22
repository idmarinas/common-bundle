<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/01/2025, 13:14
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    services.php
 * @date    16/01/2025
 * @time    20:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use App\Repository\ContactRepository;
use Doctrine\Persistence\ManagerRegistry;

return static function (ContainerConfigurator $container) {
	// @formatter:off
	$container
		->services()
			->set(ContactRepository::class)
				->public()
				->args([service(ManagerRegistry::class)])
				->tag('doctrine.repository_service')

	;
	// @formatter:on
};
