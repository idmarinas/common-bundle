<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since 1.5.0
 */

namespace Idm\Bundle\Common\Traits\Tool;

use Faker\Factory;
use Faker\Generator;
use LogicException;

trait FakerTrait
{
    private ?Generator $faker = null;

    public function faker(): Generator
    {
        if ( ! class_exists(Factory::class))
        {
            throw new LogicException('Faker PHP missing. Try running "composer require --dev fakerphp/faker".');
        }

        if ( ! $this->faker instanceof Generator)
        {
            $this->faker = Factory::create();
        }

        return $this->faker;
    }
}
