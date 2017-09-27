<?php

use Symfony\Component\ClassLoader\ClassLoader;

require_once __DIR__.'/../vendor/autoload.php';

$loader = new ClassLoader();
$loader->addPrefix('Document\\', __DIR__);
$loader->addPrefix('Application\\', __DIR__);
$loader->register();

return $loader;