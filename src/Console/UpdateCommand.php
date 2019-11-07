<?php
declare(strict_types=1);
/**
 * UpdateCommand
 *
 * @copyright Copyright © 2019 LOVEBONITO SINGAPORE PTE LTD. All rights reserved.
 * @author    Tung Ha <tunghathe@lovebonito.com>
 */

namespace TungHa\CacheWarmer\Console;

use Humbug\SelfUpdate\Updater;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class UpdateCommand extends Command
{
    const PHAR_FILE_URL = 'https://tunght13488.github.io/cache-warmer/cache-warmer.phar';
    const PHAR_VERSION_URL = 'https://tunght13488.github.io/cache-warmer/cache-warmer.phar.version';

    protected function configure()
    {
        $this->setName('update')
            ->setDescription('Update cache-warmer.phar to the latest version')
            ->addOption('rollback', 'r', InputOption::VALUE_NONE, 'Revert to previous version');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $updater = new Updater(null, false);

        if ($input->getOption('rollback')) {
            if (!$updater->rollback()) {
                return 1;
            }

            return 0;
        }

        $updater->getStrategy()->setPharUrl(self::PHAR_FILE_URL);
        $updater->getStrategy()->setVersionUrl(self::PHAR_VERSION_URL);
        if (!$updater->update()) {
            $output->writeln('<info>No update needed</info>');

            return 0;
        }
        $output->writeln(sprintf('Updated from %s to %s', $updater->getOldVersion(), $updater->getNewVersion()));

        return 0;
    }
}
