<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see     https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since   1.1.0
 */

namespace Idm\Bundle\Common\Tests\Validator;

use Idm\Bundle\Common\Validator\Constraint\IsEven;
use Idm\Bundle\Common\Validator\Constraint\IsOdd;
use Idm\Bundle\Common\Validator\Constraint\IsOddValidator;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;
use Throwable;

class ContainsIsOddValidatorTest extends ConstraintValidatorTestCase
{
    public function testNullIsValid (): void
    {
        $this->validator->validate(null, new IsOdd());

        $this->assertNoViolation();
    }

    public function testEmptyIsValid (): void
    {
        $this->validator->validate('', new IsOdd());

        $this->assertNoViolation();
    }

    public function testConstraintInvalid (): void
    {
        try {
            $this->validator->validate(5, new IsEven());
            $this->fail('Fail expect a exception for argument of Constraint not is correct');
        } catch (Throwable) {
            // -- Expected argument of type "Idm\Bundle\Common\Validator\Constraints\IsEven", "Idm\Bundle\Common\Validator\Constraints\IsOdd" given
            $this->assertNoViolation();
        }
    }

    public function testNotValidNumber (): void
    {
        try {
            $this->validator->validate('rr', new IsOdd());
            $this->fail('Fail expect a exception for argument of type "int|float"');
        } catch (Throwable) {
            // -- Expected argument of type "int|float", "string" given
            $this->assertNoViolation();
        }
    }

    public function testIsInvalid (): void
    {
        $this->validator->validate(6, new IsOdd());

        $this
            ->buildViolation('idm.common.is_odd')->setParameter('{{ number }}', 6)->assertRaised()
        ;
    }

    public function testIsValid (): void
    {
        $this->validator->validate(5, new IsOdd());

        $this->assertNoViolation();
    }

    protected function createValidator (): ConstraintValidatorInterface
    {
        return new IsOddValidator();
    }
}
