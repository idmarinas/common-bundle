<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since 1.1.0
 */

namespace Idm\Bundle\Common\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Constraint;

/**
 * Check if value is even.
 *
 * @Annotation
 */
#[Attribute]
class IsEven extends Constraint
{
    public $message = 'idm.common.is_even';
}
