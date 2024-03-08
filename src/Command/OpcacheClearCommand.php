<?php

/**
 * This file is part of Bundle "IdmCommonBundle".
 *
 * @see https://github.com/idmarinas/common-bundle/
 *
 * @license https://github.com/idmarinas/common-bundle/blob/master/LICENSE.txt
 *
 * @since 2.2.0
 */

namespace Idm\Bundle\Common\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(
    name: 'idm:opcache:reset',
    description: 'Reset OPCache',
)]
class OpcacheClearCommand extends Command
{
    protected static $defaultName = 'idm:opcache:reset';

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if (opcache_reset()) {
            $io->success('OPcache has been reset.');
        } else {
            $io->error('Failed to reset OPcache.');
        }

        return Command::SUCCESS;
    }
}
