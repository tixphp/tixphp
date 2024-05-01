<?php

declare(strict_types=1);

namespace Tix\Routing;

class RouterPath
{
  public function __construct(
    protected array $routes = [],
    protected array $web = []
  )
  {
  }

  public function checkPath(array $routes, array $web): bool
  {
    $this->routes = $routes;
    $this->web = $web;

    return array_key_exists($this->routes['path'], $this->web);
  }
}
