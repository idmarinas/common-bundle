<?php

/**
 * Copyright 2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 05/05/2026, 18:30
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactControllerTest.php
 * @date    23/01/2025
 * @time    16:48
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

declare(strict_types=1);

namespace Idm\Bundle\Common\Tests\Controller;

use Idm\Bundle\Common\Tests\CreateKernelCaseTrait;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Request;
use function Zenstruck\Foundry\faker;

final class ContactControllerTest extends WebTestCase
{
	use CreateKernelCaseTrait;

	public function testIndex()
	{
		$client = static::createClient(['environment' => 'contact']);
		$client->request(Request::METHOD_GET, '/contact');

		$this->assertResponseIsSuccessful();

		$this->assertPageTitleContains('IDMarinas Common Bundle');
		$this->assertSelectorTextContains('h2', 'Your information');
	}

	public function testSubmit()
	{
		$client = static::createClient(['environment' => 'contact']);
		$client->request(Request::METHOD_POST, '/contact');

		$client->submitForm('contact_form_buttonSubmit', [
			'contact_form[name]'     => faker()->firstName(),
			'contact_form[lastName]' => faker()->lastName(),
			'contact_form[email]'    => faker()->email(),
			'contact_form[comment]'  => faker()->text(),
			'contact_form[consent]'  => true,
		]);

		$this->assertResponseIsSuccessful();

		$this->assertSelectorTextContains('.flash-success', 'Your comments/questions have been sent successfully.');
	}

	public function testSubmitNotEmail()
	{
		$client = static::createClient(['environment' => 'contact']);
		$client->request(Request::METHOD_POST, '/contact');

		$client->submitForm('contact_form_buttonSubmit', [
			'contact_form[name]'     => faker()->firstName(),
			'contact_form[lastName]' => faker()->lastName(),
			'contact_form[comment]'  => faker()->text(),
			'contact_form[consent]'  => true,
		]);

		$this->assertResponseIsSuccessful();

		$this->assertSelectorTextContains('.flash-success', 'Your comments/questions have been sent successfully.');
	}

	public function testSubmitInvalid()
	{
		$client = static::createClient(['environment' => 'contact']);
		$client->request(Request::METHOD_POST, '/contact');

		$client->submitForm('contact_form_buttonSubmit', [
			'contact_form[name]'     => faker()->name(),
			'contact_form[lastName]' => faker()->lastName(),
			'contact_form[comment]'  => faker()->text(400),
			'contact_form[consent]'  => false,
		]);

		$this->assertResponseIsUnprocessable();

		$this->assertSelectorTextContains('form', 'This value should be true.');
	}
}
