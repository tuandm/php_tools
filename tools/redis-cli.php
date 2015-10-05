#!/usr/bin/env php
<?php
/**
 * File redis-cli.php
 * @package PHP Tools
 */
require dirname(__DIR__) . '/vendor/autoload.php';

$application = new \Cli\Application\Redis();
$application->run();
