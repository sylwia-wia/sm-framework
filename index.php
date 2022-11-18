<?php

use sm\Kernel;

require_once 'vendor/autoload.php';
$config = require __DIR__ . '/config.php';


$kernel = new Kernel($config);
$kernel->run();



