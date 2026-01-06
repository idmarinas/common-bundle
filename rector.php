<?php
/**
 * Copyright 2024-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 18:38
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    rector.php
 * @date    03/12/2024
 * @time    21:37
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.2.0
 */

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Symfony\Set\SymfonySetList;

return RectorConfig::configure()
	->withPaths([
		__DIR__ . '/app/src',
		__DIR__ . '/factories',
		__DIR__ . '/fixtures',
		__DIR__ . '/src',
		__DIR__ . '/tests',
	])
	->withPhpSets(php83: true)
	->withPreparedSets(
		deadCode           : true,
		codeQuality        : true,
		codingStyle        : true,
		doctrineCodeQuality: true,
		symfonyCodeQuality : true,
		symfonyConfigs     : true,
		twig               : true
	)
	->withImportNames(removeUnusedImports: true)
	->withTypeCoverageLevel(0)
	->withSets([
		SymfonySetList::SYMFONY_64,
		SymfonySetList::SYMFONY_CONSTRUCTOR_INJECTION,
	])
;
