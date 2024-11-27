<?php
/**
 * Copyright 2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/11/24, 15:43
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    OpcacheClearCommand.php
 * @date    08/03/2024
 * @time    13:06
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   2.2.0
 */

namespace Idm\Bundle\Common\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;

#[AsCommand(name: 'idm:opcache:reset', description: 'Reset OPCache',)]
class OpcacheClearCommand extends Command
{
    protected function execute (InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);

        if (function_exists('opcache_reset')) {
            if (opcache_reset()) {
                $io->success('OPcache has been reset.');
            } else {
                $io->error('Failed to reset OPcache.');
            }
        } else {
            $io->error('Function "opcache_reset" not exist.');
        }

        return Command::SUCCESS;
    }
}
