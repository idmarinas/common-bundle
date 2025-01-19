<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 19/01/2025, 19:33
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    bundles.php
 * @date    16/01/2025
 * @time    20:47
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

use DAMA\DoctrineTestBundle\DAMADoctrineTestBundle;
use Doctrine\Bundle\DoctrineBundle\DoctrineBundle;
use Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle;
use Idm\Bundle\Common\IdmCommonBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\MakerBundle\MakerBundle;
use Zenstruck\Foundry\ZenstruckFoundryBundle;

return [
	FrameworkBundle::class        => ['all' => true],
	DoctrineBundle::class         => ['all' => true],
	IdmCommonBundle::class        => ['all' => true],

	// Dev-Test Bundles
	MakerBundle::class            => ['all' => true],
	DoctrineFixturesBundle::class => ['all' => true],
	DAMADoctrineTestBundle::class => ['all' => true],
	ZenstruckFoundryBundle::class => ['all' => true],
];
