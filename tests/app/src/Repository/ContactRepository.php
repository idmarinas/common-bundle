<?php
/**
 * Copyright 2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/01/2025, 12:45
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    ContactRepository.php
 * @date    22/01/2025
 * @time    12:44
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.4.0
 */

namespace App\Repository;

use App\Entity\Contact;
use Doctrine\Persistence\ManagerRegistry;
use Idm\Bundle\Common\Model\Repository\AbstractContactRepository;

class ContactRepository extends AbstractContactRepository
{
	public function __construct (ManagerRegistry $registry)
	{
		parent::__construct($registry, Contact::class);
	}
}
