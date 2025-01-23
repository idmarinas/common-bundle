<?php

/**
 * Copyright 2022-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 23/01/2025, 16:17
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContainsIsEvenValidatorTest.php
 * @date    05/11/2022
 * @time    18:32
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.1.0
 */

namespace Idm\Bundle\Common\Tests\Validator;

use Idm\Bundle\Common\Validator\Constraint\IsEven;
use Idm\Bundle\Common\Validator\Constraint\IsEvenValidator;
use Idm\Bundle\Common\Validator\Constraint\IsOdd;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use Throwable;

class ContainsIsEvenValidatorTest extends ConstraintValidatorTestCase
{
	public function testNullIsValid (): void
	{
		$this->validator->validate(null, new IsEven());

		$this->assertNoViolation();
	}

	public function testEmptyIsValid (): void
	{
		$this->validator->validate('', new IsEven());

		$this->assertNoViolation();
	}

	public function testConstraintInvalid (): void
	{
		try {
			$this->validator->validate(5, new IsOdd());
			$this->fail('Fail expect a exception for argument of Constraint not is correct');
		} catch (Throwable) {
			// -- Expected argument of type "Idm\Bundle\Common\Validator\Constraints\IsEven", "Idm\Bundle\Common\Validator\Constraints\IsOdd" given
			$this->assertNoViolation();
		}
	}

	public function testNotValidNumber (): void
	{
		try {
			$this->validator->validate('rr', new IsEven());
			$this->fail('Fail expect a exception for argument of type "int|float"');
		} catch (Throwable) {
			// -- Expected argument of type "int|float", "string" given
			$this->assertNoViolation();
		}
	}

	public function testIsInvalid (): void
	{
		$this->validator->validate(5, new IsEven());

		$this
			->buildViolation('idm_common_bundle.is_even')->setParameter('{{ number }}', 5)->assertRaised()
		;
	}

	public function testIsValid (): void
	{
		$this->validator->validate(6, new IsEven());

		$this->assertNoViolation();
	}

	protected function createValidator (): ConstraintValidatorInterface
	{
		return new IsEvenValidator();
	}
}
