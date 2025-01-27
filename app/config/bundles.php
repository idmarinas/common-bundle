<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/01/2025, 19:49
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
use EasyCorp\Bundle\EasyAdminBundle\EasyAdminBundle;
use Idm\Bundle\Common\IdmCommonBundle;
use Stof\DoctrineExtensionsBundle\StofDoctrineExtensionsBundle;
use Symfony\Bundle\FrameworkBundle\FrameworkBundle;
use Symfony\Bundle\MakerBundle\MakerBundle;
use Symfony\Bundle\SecurityBundle\SecurityBundle;
use Symfony\Bundle\TwigBundle\TwigBundle;
use Symfony\UX\TwigComponent\TwigComponentBundle;
use Twig\Extra\TwigExtraBundle\TwigExtraBundle;
use Zenstruck\Foundry\ZenstruckFoundryBundle;

return [
	FrameworkBundle::class              => ['all' => true],
	DoctrineBundle::class               => ['all' => true],
	IdmCommonBundle::class              => ['all' => true],
	StofDoctrineExtensionsBundle::class => ['all' => true],
	TwigBundle::class                   => ['all' => true],
	TwigExtraBundle::class              => ['all' => true],
	SecurityBundle::class               => ['all' => true],
	TwigComponentBundle::class          => ['all' => true],
	EasyAdminBundle::class              => ['all' => true],

	// Dev-Test Bundles
	MakerBundle::class                  => ['all' => true],
	DoctrineFixturesBundle::class       => ['all' => true],
	DAMADoctrineTestBundle::class       => ['all' => true],
	ZenstruckFoundryBundle::class       => ['all' => true],
];
