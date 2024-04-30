<?php

// Check if the autoload.php file exists in the vendor directory.
if (file_exists($autoload = __DIR__ . '/../vendor/autoload.php')) {
  require_once($autoload);
}

use App\Boot\Loader;

// Create an instance of the Loader class.
$boot = new Loader();

// Initialize the application by loading the necessary data and settings.
$boot->initialization();
