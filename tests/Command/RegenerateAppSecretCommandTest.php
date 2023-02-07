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

namespace App\Tests\Command;

use Idm\Bundle\Common\Command\RegenerateAppSecretCommand;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Tester\CommandTester;

class RegenerateAppSecretCommandTest extends KernelTestCase
{
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
}
