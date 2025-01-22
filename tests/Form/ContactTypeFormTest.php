<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/01/2025, 13:44
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactTypeFormTest.php
 * @date    27/11/2024
 * @time    19:05
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Tests\Form;

use App\Entity\Contact;
use Idm\Bundle\Common\Model\Form\AbstractContactFormType;
use Symfony\Component\Form\Test\TypeTestCase;
use function Zenstruck\Foundry\faker;

class ContactTypeFormTest extends TypeTestCase
{
	public function testSubmitValidData (): void
	{
		$formData = [
			'name'     => faker()->name(),
			'lastName' => faker()->lastName(),
			'email'    => faker()->email(),
			'comment'  => faker()->text(),
			'consent'  => faker()->boolean(),
		];

		$model = (new Contact());
		// $model will retrieve data from the form submission; pass it as the second argument
		$form = $this->factory->create(ContactFormType::class, $model);

		$expected = (clone $model)
			->setName($formData['name'])
			->setLastName($formData['lastName'])
			->setEmail($formData['email'])
			->setComment($formData['comment'])
			->setConsent($formData['consent'])
		;
		// ...populate $expected properties with the data stored in $formData

		// submit the data to the form directly
		$form->submit($formData);

		// This check ensures there are no transformation failures
		$this->assertTrue($form->isSynchronized());

		// check that $model was modified as expected when the form was submitted
		$this->assertEquals($expected, $model);
	}
}

class ContactFormType extends AbstractContactFormType {}
