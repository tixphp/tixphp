<?php

declare(strict_types=1);

// Check if the revision file exists.
if (file_exists($revision = __DIR__ . '/../App/revision.php')) {
  // Include the revision file if it exists.
  require_once($revision);
} else {
  // If the revision file does not exist, display an error message and exit.
  echo "The application is not available.";
  exit();
}

// Check if the bootstrap file exists.
if (file_exists($bootstrap = __DIR__ . '/../App/bootstrap.php')) {
  // Include the bootstrap file if it exists.
  require_once($bootstrap);
} else {
  // If the bootstrap file does not exist, display an error message and exit.
  echo "The application is not available.";
  exit();
}
