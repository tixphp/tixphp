<?php

declare(strict_types=1);

namespace Tix\Routing;

class Router
{
  public function __construct(
    public array $routes = []
  ) {}

  public function load(): void {
    $this->ech($this->routes);
  }

  public function ech($data) {
    print_r($data);
  }
}
