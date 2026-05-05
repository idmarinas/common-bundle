<?php
/**
 * Copyright $originalComment.match("Copyright (\d+)", 1, "-",$today.year)2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 10:21
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactFixtures.php
 * @date    22/01/2025
 * @time    13:17
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace Idm\Bundle\Common\Tests\DataFixtures;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;
use Idm\Bundle\Common\Tests\Factory\ContactFactory;

class ContactFixtures extends Fixture
{
	public function load(ObjectManager $manager): void
	{
		ContactFactory::createMany(50, ['email' => '']);
		ContactFactory::createMany(50);
	}
}
