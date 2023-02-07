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

namespace Idm\Bundle\Common\Command;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Filesystem\Filesystem;

class RegenerateAppSecretCommand extends Command
{
    protected static $defaultName = 'idm:regenerate:app_secret';

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
            ->setDescription('Regenerate APP_SECRET for application in .env file')
            ->setHelp(
                <<<'EOT'
                    The <info>%command.name%</info> command regenerate APP_SECRET value of .env file for application.
                    EOT
            )

            ->addOption('show', null, InputOption::VALUE_NONE, 'Only display the value without updating the .env file.')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $io        = new SymfonyStyle($input, $output);
        $showValue = $input->getOption('show');
        $key       = 'APP_SECRET';
        $length    = 16;
        $secret    = \bin2hex(\random_bytes($length));

        if ($showValue)
        {
            $io->success("New {$key} was generated: {$secret}");

            return 0;
        }

        $file = '.env';

        if (\is_file($file) && \is_readable($file) && \is_writable($file))
        {
            $str = file_get_contents($file);
            $fs  = new Filesystem();

            $pattern = "/^(?<secret>{$key}=.+)$/m";
            preg_match($pattern, $str, $matches);

            if (isset($matches['secret']) && \is_string($matches['secret']))
            {
                $str = \preg_replace("/{$matches['secret']}/", "{$key}={$secret}", $str);

                $fs->dumpFile($file, $str);

                $io->success("New {$key} was generated: {$secret}");
            }
            else
            {
                $io->warning("Not find {$key} in file '{$file}'");
            }

            return 0;
        }

        $io->warning('Not find file ".env" or not is readable or writable.');

        return 0;
    }
}
