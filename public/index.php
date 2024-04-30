<?php

declare(strict_types=1);

if (file_exists($autoload = __DIR__ . '/../vendor/autoload.php')) {
  require_once($autoload);
}

use App\boot\Loader;

$boot = new Loader();
$boot->initialization();
