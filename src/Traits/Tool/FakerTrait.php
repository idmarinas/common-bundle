<?php
/**
 * Copyright 2023-2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 13:38
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    FakerTrait.php
 * @date    13/04/2023
 * @time    16:35
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.5.0
 */

namespace Idm\Bundle\Common\Traits\Tool;

use Faker\Factory;
use Faker\Generator;
use LogicException;

trait FakerTrait
{
    private ?Generator $faker = null;

    public function faker (): Generator
    {
        if (!class_exists(Factory::class)) {
            throw new LogicException('Faker PHP missing. Try running "composer require --dev fakerphp/faker".');
        }

        if (!$this->faker instanceof Generator) {
            $this->faker = Factory::create();
        }

        return $this->faker;
    }
}
