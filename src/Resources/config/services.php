<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since 1.0.0
 */

namespace Symfony\Component\DependencyInjection\Loader\Configurator;

use Idm\Bundle\Common\Command\RegenerateAppSecretCommand;

return static function (ContainerConfigurator $container)
{
    $container->services()
        ->set('idm.common.command.reg_app_secret', RegenerateAppSecretCommand::class)
            ->tag('console.command')
    ;
};
