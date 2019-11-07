<?php
declare(strict_types=1);
/**
 * warn-cache.php
 *
 * @copyright Copyright © 2019 Tung Ha. All rights reserved.
 * @author    Ha The Tung <tunght13488@gmail.com>
 */

require __DIR__ . '/../vendor/autoload.php';

use Symfony\Component\Console\Application;
use TungHa\CacheWarmer\Console\TestCommand;
use TungHa\CacheWarmer\Console\UpdateCommand;

$application = new Application('WarmCache', '@package_version@');
$application->add(new TestCommand());
$application->add(new UpdateCommand());
$application->run();
