<?php
/**
 * Copyright 2025-2026 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 06/01/2026, 19:29
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    Contact.php
 * @date    22/01/2025
 * @time    12:43
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace App\Entity;

use App\Repository\ContactRepository;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Idm\Bundle\Common\Model\Entity\AbstractContact;

#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact extends AbstractContact
{
	public function __construct ()
	{
		$this->createdAt = new DateTime();
		$this->updatedAt = new DateTime();
	}
}
