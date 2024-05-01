<?php

declare(strict_types=1);

namespace Tix\Routing;

class RouterQuery
{
  public function __construct(
    protected array $routes = [],
    protected array $web = []
  )
  {
  }

  public function getQuery(array $routes): array
  {
    $this->routes = $routes;

    $query = [];
    if (!empty($this->routes)) {
      foreach ($this->routes as $key => $value) {
        $query[$key] = $value;
      }

      return $query;
    }

    return [];
  }
}
