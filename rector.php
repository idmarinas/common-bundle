<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;

return RectorConfig::configure()
	->withPaths([
		__DIR__ . '/config',
		__DIR__ . '/src',
		__DIR__ . '/tests',
	])
	->withPhpSets(php83: true)
	->withPreparedSets(
		phpunitCodeQuality : true,
		doctrineCodeQuality: true,
		symfonyCodeQuality : true,
		symfonyConfigs     : true
	)
	->withTypeCoverageLevel(0)
	->withDeadCodeLevel(0)
	->withCodeQualityLevel(0)
	->withImportNames(importDocBlockNames: false, removeUnusedImports: true)
	->withComposerBased(twig: true, doctrine: true, symfony: true)
	->withSymfonyContainerXml(__DIR__ . '/var/cache/dev/App_KernelDevDebugContainer.xml')
	->withSkip([
		__DIR__ . '/tests/app/config/bundles.php',
	])
;
