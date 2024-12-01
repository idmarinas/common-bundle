<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 19:52
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    UuidTraitTest.php
 * @date    28/11/2024
 * @time    19:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Tests\Traits\Entity;

use Idm\Bundle\Common\Traits\Entity\UuidTrait;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Uid\Uuid;

class UuidTraitTest extends TestCase
{
    public function testUuid ()
    {
        $entity = new UuidTraitCheck();

        $uuid = Uuid::v4();
        $entity->setId($uuid);

        $this->assertEquals($uuid, $entity->getId());
    }
}

class UuidTraitCheck
{
    use UuidTrait;
}
