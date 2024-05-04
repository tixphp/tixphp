<?php

declare(strict_types=1);

namespace Tix\Routing;

use AllowDynamicProperties;
use Tix\Http\Request;

#[AllowDynamicProperties] class Router
{
  public function __construct(
    public array $routes = []
  )
  {
    $this->request = new Request();
    $this->routerMethod = new RouterMethod();
    $this->routerPath = new RouterPath();
    $this->routerQuery = new RouterQuery();
    $this->routerController = new RouterController();
  }

  public function load(array $web): void
  {
    // This instance return routes from request method.
    $method = $this->routerMethod->determinate($this->routes, $web);

    // This instance checks whether the parameters passed in the request match those of web.php and returns true or false.
    $path = $this->routerPath->checkPath($this->routes, $method);

    // This instance returns an array of all query parameters from the query. If there are none, it returns an empty array.
    $query = $this->routerQuery->getQuery($this->request->getUriParams());

    $r = $this->controller($method);
    print_r($r);
    //print_r($web);
    //print_r($method[$this->routes['path']]);

  }

  protected function method(array $routes, array $web): array
  {
    return $this->routerMethod->determinate($this->routes, $web);
  }

  protected function path(array $routes, array $method): bool
  {
    return $this->routerPath->checkPath($this->routes, $method);
  }

  protected function query(): array
  {
    return $this->routerQuery->getQuery($this->request->getUriParams());
  }

  protected function controller(array $method): void
  {
    try {
      $this->routerController->loadController($this->routes, $method);
    } catch (\InvalidArgumentException $e) {
      echo $e->getMessage();
    }
  }

}
