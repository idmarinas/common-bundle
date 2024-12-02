<?php
/**
 * Copyright 2022-2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/11/24, 19:14
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

use Idm\Bundle\Common\Command\OpcacheClearCommand;
use Idm\Bundle\Common\Command\RegenerateAppSecretCommand;

return static function (ContainerConfigurator $container): void {
    $container
        ->services()
        ->set('idm.common.command.reg_app_secret', RegenerateAppSecretCommand::class)
        ->set('idm.common.command.opcache_clear', OpcacheClearCommand::class)
    ;
};
