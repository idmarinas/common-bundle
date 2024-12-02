<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 19:33
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    FakerTraitTest.php
 * @date    28/11/2024
 * @time    19:33
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Tests\Traits\Tool;

use Idm\Bundle\Common\Traits\Tool\FakerTrait;
use LogicException;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;
use ReflectionClass;

class FakerTraitTest extends TestCase
{
    use PHPMock;

    public function testFakerNotInstalled (): void
    {
        $this->expectException(LogicException::class);

        $namespace = (new ReflectionClass(FakerTrait::class))->getNamespaceName();
        $mock = $this->getFunctionMock($namespace, 'class_exists');
        $mock->expects($this->once())->willReturn(false);

        (new FakerCheck())->faker();
    }
}

class FakerCheck
{
    use FakerTrait;
}
