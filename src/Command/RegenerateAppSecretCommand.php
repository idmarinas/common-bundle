<?php
/**
 * Copyright 2022-2024 (C) IDMarinas - All Rights Reserved
 *
 * Last modified by "IDMarinas" on 27/11/24, 15:49
 *
 * @project IDMarinas Common Bundle
 * @see     https://github.com/idmarinas/common-bundle
 *
 * @file    RegenerateAppSecretCommand.php
 * @date    31/12/2022
 * @time    16:14
 *
 * @author  Iván Diaz Marinas (IDMarinas)
 * @license BSD 3-Clause License
 *
 * @since   1.4.0
 */

namespace Idm\Bundle\Common\Command;

use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;
use function bin2hex;
use function is_file;
use function is_readable;
use function is_string;
use function is_writable;
use function preg_replace;
use function random_bytes;

#[AsCommand(name: 'idm:regenerate:app_secret', description: 'Regenerate APP_SECRET for application in .env file')]
class RegenerateAppSecretCommand extends Command
{
    /**
     * {@inheritdoc}
     */
    protected function configure (): void
    {
        $this
            ->setHelp(
                <<<'EOT'
                    The <info>%command.name%</info> command regenerate APP_SECRET value of .env file for application.
                    EOT
            )
            ->addOption('show', null, InputOption::VALUE_NONE, 'Only display the value without updating the .env file.')
        ;
    }

    protected function execute (InputInterface $input, OutputInterface $output): int
    {
        $io = new SymfonyStyle($input, $output);
        $showValue = $input->getOption('show');
        $key = 'APP_SECRET';
        $length = 16;
        $secret = bin2hex(random_bytes($length));

        if ($showValue) {
            $io->success(sprintf('New %s was generated: %s', $key, $secret));

            return Command::SUCCESS;
        }

        $file = '.env';

        if (is_file($file) && is_readable($file) && is_writable($file)) {
            $str = file_get_contents($file);
            $fs = new Filesystem();

            $pattern = sprintf('/^(?<secret>%s=.+)$/m', $key);
            preg_match($pattern, $str, $matches);

            if (isset($matches['secret']) && is_string($matches['secret'])) {
                $str = preg_replace(sprintf('/%s/', $matches['secret']), sprintf('%s=%s', $key, $secret), $str);

                $fs->dumpFile($file, $str);

                $io->success(sprintf('New %s was generated: %s', $key, $secret));
            } else {
                $io->warning(sprintf("Not find %s in file '%s'", $key, $file));
            }

            return Command::SUCCESS;
        }

        $io->warning('Not find file ".env" or not is readable or writable.');

        return Command::SUCCESS;
    }
}
