#!/usr/bin/env php
<?php

require __DIR__.'/vendor/autoload.php';
require  __DIR__.'/src/OutsideNow/TestCommand.php';

use OutsideNow\TestCommand;
use Symfony\Component\Console\Application;

$application = new Application();
$application->add(new TestCommand());
$application->run();