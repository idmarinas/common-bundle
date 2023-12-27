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

namespace Idm\Bundle\Common\Tests\Validator;

use Throwable;
use Symfony\Component\Validator\ConstraintValidatorInterface;
use Idm\Bundle\Common\Validator\Constraints\IsEven;
use Idm\Bundle\Common\Validator\Constraints\IsOddValidator;
use Idm\Bundle\Common\Validator\Constraints\IsOdd;
use Symfony\Component\Validator\Test\ConstraintValidatorTestCase;

class ContainsIsOddValidatorTest extends ConstraintValidatorTestCase
{
    public function testNullIsValid()
    {
        $this->validator->validate(null, new IsOdd());

        $this->assertNoViolation();
    }

    public function testEmptyIsValid()
    {
        $this->validator->validate('', new IsOdd());

        $this->assertNoViolation();
    }

    public function testConstraintInvalid()
    {
        try
        {
            $this->validator->validate(5, new IsEven());
            $this->fail('Fail expect a exception for argument of Constraint not is correct');
        }
        catch (Throwable $th)
        {
            // -- Expected argument of type "Idm\Bundle\Common\Validator\Constraints\IsEven", "Idm\Bundle\Common\Validator\Constraints\IsOdd" given
            $this->assertNoViolation();
        }
    }

    public function testNotValidNumber()
    {
        try
        {
            $this->validator->validate('rr', new IsOdd());
            $this->fail('Fail expect a exception for argument of type "int|float"');
        }
        catch (Throwable $th)
        {
            // -- Expected argument of type "int|float", "string" given
            $this->assertNoViolation();
        }
    }

    public function testIsInvalid()
    {
        $this->validator->validate(6, new IsOdd());

        $this->buildViolation('idm.common.is_odd')
            ->setParameter('{{ number }}', 6)
            ->assertRaised()
        ;
    }

    public function testIsValid()
    {
        $this->validator->validate(5, new IsOdd());

        $this->assertNoViolation();
    }

    protected function createValidator(): ConstraintValidatorInterface
    {
        return new IsOddValidator();
    }
}
