<?php

declare(strict_types=1);

// Check if the Composer autoload file exists.
if (!file_exists($autoload = __DIR__ . '/../vendor/autoload.php')) {
  echo "To start the application please start <b>composer install</b> in the root directory of the project.";
  exit();
}

// Check if the PHP version is below 8.3.0.
if (version_compare(PHP_VERSION, '8.3.0') < 0) {
  echo "Attention: The version of PHP you are using is less than 8.3.0. Some functionalities may not be available or may not work correctly.<br>Please update your PHP version to 8.3.0 or higher to run the application.";
  exit();
}
