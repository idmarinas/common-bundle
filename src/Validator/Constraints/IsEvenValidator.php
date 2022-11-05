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

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;

/**
 * Check if value is even.
 */
class IsEvenValidator extends ConstraintValidator
{
    public function validate($value, Constraint $constraint)
    {
        if ( ! $constraint instanceof IsEven)
        {
            throw new UnexpectedTypeException($constraint, IsEven::class);
        }

        // custom constraints should ignore null and empty values to allow
        // other constraints (NotBlank, NotNull, etc.) take care of that
        if (null === $value || '' === $value)
        {
            return;
        }

        if ( ! \is_numeric($value))
        {
            //-- Tiene que ser un valor entero o decimal
            throw new UnexpectedValueException($value, 'int|float');
        }

        //-- Check if number is even, if is odd add a violation
        if ($value % 2 != 0)
        {
            $this->context->buildViolation($constraint->message)
                ->setParameter('{{ number }}', $value)
                ->addViolation()
            ;
        }
    }
}

