<?php

declare(strict_types=1);

namespace Tix\Routing;

use InvalidArgumentException;

class RouterController
{
  public function __construct(
    protected array $routes = [],
    protected array $web = []
  )
  {
  }

  public function loadController(array $routes, array $method): void
  {
    $path = $routes['path'];

    if (!isset($method[$path])) {
      throw new InvalidArgumentException("RouterController :: Path $path not found in method array.");
    }

    try {
      $this->arrayController($method, $path);
      $this->arrayMethod($method, $path);
      $this->getController($routes, $method);

    } catch (InvalidArgumentException $e) {
      echo $e->getMessage();
    }
  }

  private function arrayController(array $method, string $path): void
  {
    if (!preg_match('/controller:(?:.*?\/)?(.*?)@/', $method[$path], $matches)) {
      throw new InvalidArgumentException("RouterController :: Invalid controller format in path: $path");
    }
  }

  private function arrayMethod(array $method, string $path): void
  {
    if (!preg_match('/@(.*)/', $method[$path], $matches)) {
      throw new InvalidArgumentException("RouterController :: Invalid method format in path: $path");
    }
  }

  private function getController(array $routes, array $method): void
  {
    $path = $method[$routes['path']];

    if (preg_match('/controller:(.*?)@/', $path, $matches)) {
      $class = '\App\Http\Controllers\\' . str_replace('/', '\\', $matches[1]);
      if (!class_exists($class)) {
        throw new InvalidArgumentException("RouterController :: Controller not found: $class");
      }
    } else {
      throw new InvalidArgumentException("RouterController :: Controller not found");
    }
  }
}
