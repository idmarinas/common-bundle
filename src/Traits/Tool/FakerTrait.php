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

trait FakerTrait
{
    private ?Generator $faker = null;

    public function faker(): Generator
    {
        if ( ! $this->faker instanceof Generator)
        {
            $this->faker = Factory::create();
        }

        return $this->faker;
    }
}
