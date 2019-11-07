<?php
declare(strict_types=1);
/**
 * TestCommand
 *
 * @copyright Copyright © 2019 Tung Ha. All rights reserved.
 * @author    Ha The Tung <tunght13488@gmail.com>
 */

namespace TungHa\CacheWarmer\Console;

use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

class TestCommand extends Command
{
    protected function configure()
    {
        $this
            ->setName('test')
            ->setDescription('Test');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->writeln('Test...');
    }
}
