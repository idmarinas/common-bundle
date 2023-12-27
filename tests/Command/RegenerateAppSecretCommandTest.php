<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since 1.4.0
 */

namespace Idm\Bundle\Common\Tests\Command;

use Idm\Bundle\Common\Command\RegenerateAppSecretCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;
use Symfony\Component\Filesystem\Filesystem;

class RegenerateAppSecretCommandTest extends KernelTestCase
{
    private string $cFile = '.env';
    private string $cKey  = 'APP_SECRET';

    public function testExecuteShow()
    {
        $commandTester = new CommandTester(new RegenerateAppSecretCommand());
        $commandTester->execute([
            // pass arguments to the helper
            '--show' => true,

            // prefix the key with two dashes when passing options,
            // e.g: '--some-option' => 'option_value',
            // use brackets for testing array value,
            // e.g: '--some-option' => ['option_value'],
        ]);

        // $commandTester->assertCommandIsSuccessful();

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('New APP_SECRET', $output);

        // ...
    }

    public function testNotFile()
    {
        $commandTester = new CommandTester(new RegenerateAppSecretCommand());
        $commandTester->execute([
            '--show' => false,
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString('Not find file ".env" or not is readable or writable.', $output);
    }

    public function testNotSecret()
    {
        $fs            = new Filesystem();
        $commandTester = new CommandTester(new RegenerateAppSecretCommand());

        $fs->touch($this->cFile);

        $commandTester->execute([
            '--show' => false,
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("Not find $this->cKey in file '$this->cFile", $output);

        $fs->remove($this->cFile);
    }

    public function testSecret()
    {
        $fs            = new Filesystem();
        $commandTester = new CommandTester(new RegenerateAppSecretCommand());

        $fs->touch($this->cFile);
        $fs->dumpFile($this->cFile, 'APP_SECRET=80196600742574c00dc7d7c02224284c');

        $commandTester->execute([
            '--show' => false,
        ]);

        // the output of the command in the console
        $output = $commandTester->getDisplay();
        $this->assertStringContainsString("New $this->cKey was generated: ", $output);

        $fs->remove($this->cFile);
    }
}
