<?php

declare(strict_types=1);

namespace App\Library;

class Routes
{
  public function __construct(
    protected array $routes,
    public string   $path
  )
  {
    $this->routes = require $path;
  }

  public function getRoutes(): array
  {
    return $this->routes;
  }
}
