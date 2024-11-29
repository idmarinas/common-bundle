<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 20:59
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    AbstractContactRepositoryTest.php
 * @date    28/11/2024
 * @time    20:59
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Tests\Repository;

use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Mapping\ClassMetadata;
use Doctrine\ORM\Query;
use Doctrine\ORM\QueryBuilder;
use Doctrine\Persistence\ManagerRegistry;
use Idm\Bundle\Common\Entity\AbstractContact;
use Idm\Bundle\Common\Repository\AbstractContactRepository;
use PHPUnit\Framework\TestCase;

class ContactRepositoryTest extends TestCase
{
    public function testCountEntityEmail ()
    {
        // Create the mocks
        $classMetadata = $this
            ->getMockBuilder(ClassMetadata::class)->setConstructorArgs([Contact::class])->getMock()
        ;
        $queryBuilder = $this->createMock(QueryBuilder::class);
        $expr = $this->createMock(Query\Expr::class);
        $query = $this->createMock(Query::class);
        $entityManager = $this->createMock(EntityManagerInterface::class);
        $managerRegistry = $this->createMock(ManagerRegistry::class);
        $entityRepository = $this->createMock(EntityRepository::class);

        // Configure Query
        $query->method('getSingleScalarResult')->willReturn(1);

        // Configure QueryBuilder
        $queryBuilder->method('select')->willReturn($queryBuilder);
        $queryBuilder->method('from')->willReturn($queryBuilder);
        $queryBuilder->method('where')->willReturn($queryBuilder);
        $queryBuilder->method('orWhere')->willReturn($queryBuilder);
        $queryBuilder->method('expr')->willReturn($expr);
        $queryBuilder->method('getQuery')->willReturn($query);

        // Configure EntityManagerInterface
        $entityManager->method('getClassMetadata')->willReturn($classMetadata);
        $entityManager->method('createQueryBuilder')->willReturn($queryBuilder);

        //Configure ManagerRegistry
        $managerRegistry->method('getRepository')->willReturn($entityRepository);
        $managerRegistry->method('getManagerForClass')->willReturn($entityManager);

        $repository = new ContactRepository($managerRegistry);
        $this->assertEquals(1, $repository->countEmptyEmail());
    }
}

class ContactRepository extends AbstractContactRepository {}

class Contact extends AbstractContact {}
