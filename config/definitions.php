<?php
/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 12:57
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    definitions.php
 * @date    04/05/2026
 * @time    21:02
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.7.0
 */

use Symfony\Component\Config\Definition\Configurator\DefinitionConfigurator;

return function (DefinitionConfigurator $definition): void {
	//@formatter:off
	$definition->rootNode()
		->children()
			->booleanNode('notifications_bag')
				->info('Whether to register the notifications bag in the session. Like FlashBag, but for toast notifications.')
				->defaultFalse()
			->end()
		->end()
	->end()
	;
};
