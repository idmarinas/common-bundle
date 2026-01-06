<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:30
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactController.php
 * @date    22/01/2025
 * @time    19:33
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace App\Controller;

use App\Entity\Contact;
use App\Form\ContactFormType;
use Idm\Bundle\Common\Model\Controller\AbstractContactController;
use Symfony\Component\Form\FormInterface;

class ContactController extends AbstractContactController
{
	/** @inheritdoc */
	protected function getContactForm (): FormInterface
	{
		return $this->createForm(ContactFormType::class, new Contact());
	}
}
