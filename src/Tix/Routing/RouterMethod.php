<?php

declare(strict_types=1);

namespace Tix\Routing;

use AllowDynamicProperties;
use Tix\Http\Request;

#[AllowDynamicProperties] class RouterMethod
{
  public function __construct(
    protected array $routes = [],
    protected array $web = []
  )
  {
    $this->request = new Request();
  }

  public function determinate(array $routes, array $web): array
  {
    $this->routes = $routes;
    $this->web = $web;

    return match ($this->request->getMethod()) {
      'GET' => $this->web['GET'],
      'POST' => $this->web['POST'],
      'HEAD' => $this->web['HEAD'],
      'PUT' => $this->web['PUT'],
      'DELETE' => $this->web['DELETE'],
      'CONNECT' => $this->web['CONNECT'],
      'OPTIONS' => $this->web['OPTIONS'],
      'TRACE' => $this->web['TRACE'],
      'PATH' => $this->web['PATH'],
      default => [],
    };
  }
}
