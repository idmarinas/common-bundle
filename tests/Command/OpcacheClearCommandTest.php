<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 28/11/24, 18:41
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    OpcacheClearCommandTest.php
 * @date    28/11/2024
 * @time    15:51
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   3.0.0
 */

namespace Idm\Bundle\Common\Tests\Command;

use Idm\Bundle\Common\Command\OpcacheClearCommand;
use phpmock\phpunit\PHPMock;
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use Symfony\Component\Console\Tester\CommandTester;

class OpcacheClearCommandTest extends TestCase
{
    use PHPMock;

    public function testOpcacheFunctionNotExists ()
    {
        $mock = $this->getFunctionMock($this->getNameSpaceCommand(), 'function_exists');
        $mock->expects($this->once())->willReturn(false);

        $commandTester = new CommandTester(new OpcacheClearCommand());
        $commandTester->execute([]);

        $output = $commandTester->getDisplay();

        $commandTester->assertCommandIsSuccessful();
        $this->assertStringContainsString('Function "opcache_reset" not exist.', $output);
    }

    public function testOpcacheFunctionExists ()
    {
        $mock = $this->getFunctionMock($this->getNameSpaceCommand(), 'function_exists');
        $mock->expects($this->once())->willReturn(true);

        $mock = $this->getFunctionMock($this->getNameSpaceCommand(), 'opcache_reset');
        $mock->expects($this->once())->willReturn(true);

        $commandTester = new CommandTester(new OpcacheClearCommand());
        $commandTester->execute([]);

        $output = $commandTester->getDisplay();

        $commandTester->assertCommandIsSuccessful();
        $this->assertStringContainsString('OPcache has been reset.', $output);
    }

    public function testOpcacheFail ()
    {
        $mock = $this->getFunctionMock($this->getNameSpaceCommand(), 'function_exists');
        $mock->expects($this->once())->willReturn(true);

        $mock = $this->getFunctionMock($this->getNameSpaceCommand(), 'opcache_reset');
        $mock->expects($this->once())->willReturn(false);

        $commandTester = new CommandTester(new OpcacheClearCommand());
        $commandTester->execute([]);

        $output = $commandTester->getDisplay();

        $commandTester->assertCommandIsSuccessful();
        $this->assertStringContainsString('Failed to reset OPcache.', $output);
    }

    private function getNameSpaceCommand (): string
    {
        return (new ReflectionClass(OpcacheClearCommand::class))->getNamespaceName();
    }
}
