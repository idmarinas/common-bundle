<?php

/**
 * Copyright 2022-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 16/01/2025, 21:32
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    IsEvenValidator.php
 * @date    05/11/2022
 * @time    17:18
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.1.0
 */

namespace Idm\Bundle\Common\Validator\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Exception\UnexpectedTypeException;
use Symfony\Component\Validator\Exception\UnexpectedValueException;
use function is_numeric;

/**
 * Check if the value is even.
 */
class IsEvenValidator extends ConstraintValidator
{
	public function validate ($value, Constraint $constraint): void
	{
		if (!$constraint instanceof IsEven) {
			throw new UnexpectedTypeException($constraint, IsEven::class);
		}

		// custom constraints should ignore null and empty values to allow
		// other constraints (NotBlank, NotNull, etc.) take care of that
		if (null === $value || '' === $value) {
			return;
		}

		if (!is_numeric($value)) {
			//-- Must be an integer or decimal value
			throw new UnexpectedValueException($value, 'int|float');
		}

		//-- Check if number is even, if is odd add a violation
		if ($value % 2 != 0) {
			$this->context
				->buildViolation($constraint->message)->setParameter('{{ number }}', $value)->addViolation()
			;
		}
	}
}
