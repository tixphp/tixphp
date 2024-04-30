<?php

declare(strict_types=1);

namespace App\boot;

use AllowDynamicProperties;
use Tix\Http\Request;

#[AllowDynamicProperties] class Loader
{
  public function __construct(
    public array $routes = []
  ) {
    $this->request = new Request();
  }

  public function initialization() {
    return $this->request->getRequest($this->routes);
  }
}
