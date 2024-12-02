<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 19:52
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    IdTraitTest.php
 * @date    28/11/2024
 * @time    19:52
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Tests\Traits\Entity;

use Idm\Bundle\Common\Traits\Entity\IdTrait;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;

class IdTraitTest extends TestCase
{
    use PHPMock;

    public function testIdTrait (): void
    {
        $entity = new IdTraitCheck();
        $entity->setId(1);

        $this->assertEquals(1, $entity->getId());
    }
}

class IdTraitCheck
{
    use IdTrait;
}
