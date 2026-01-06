<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:30
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactCrudController.php
 * @date    27/01/2025
 * @time    17:42
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace App\Controller\Admin;

use App\Entity\Contact;
use Idm\Bundle\Common\Model\Controller\Admin\AbstractContactCrudController;

class ContactCrudController extends AbstractContactCrudController
{
	public static function getEntityFqcn (): string
	{
		return Contact::class;
	}
}
