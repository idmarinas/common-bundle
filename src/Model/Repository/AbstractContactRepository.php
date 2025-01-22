<?php
/**
 * Copyright 2024-2025 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 22/01/2025, 12:05
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    AbstractContactRepository.php
 * @date    27/11/2024
 * @time    19:02
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Model\Repository;

use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Idm\Bundle\Common\Model\Entity\AbstractContact;

/**
 * @extends ServiceEntityRepository<AbstractContact>
 *
 * @method AbstractContact|null find($id, $lockMode = null, $lockVersion = null)
 * @method AbstractContact|null findOneBy(array $criteria, array $orderBy = null)
 * @method AbstractContact[]    findAll()
 * @method AbstractContact[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
abstract class AbstractContactRepository extends ServiceEntityRepository
{
	/** Count the number of records that do not have an email address. */
	public function countEmptyEmail (): int
	{
		$query = $this->createQueryBuilder('u');
		$query
			->select('COUNT(u) as count')->where($query->expr()->isNull('u.email'))->orWhere(
				$query->expr()->eq('u.email', "''")
			)
		;

		return (int)$query->getQuery()->getSingleScalarResult();
	}
}
