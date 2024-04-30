<?php

declare(strict_types=1);

namespace App\Boot;

use AllowDynamicProperties;
use Tix\Http\Request;
use Tix\Routing\Router;

/**
 * Class Loader
 * @package App\Boot
 *
 * This class is responsible for initializing the application.
 */
#[AllowDynamicProperties] class Loader
{
  /**
   * @var array $routes An array containing routes to be loaded by the router.
   */
  public function __construct(
    public array $routes = []
  )
  {
    // Initialize a new Request object.
    $this->request = new Request();

    // Initialize a new Router object with the parsed URL from the Request.
    $this->router = new Router($this->request->parseUrl());
  }

  /**
   * Initializes the application by loading routes into the router.
   *
   * @return void
   */
  public function initialization(): void
  {
    $this->router->load();
  }
}
