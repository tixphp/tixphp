<?php

declare(strict_types=1);

namespace Tix\Http;
use AllowDynamicProperties;
#[AllowDynamicProperties] class Request
{
  public function __construct(
    protected array $request = []
  ) {
    $this->validate = new Validate();
    $this->request = $_REQUEST;
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->encodeRequest();
  }

  public function getMethod() {
    return $this->method;
  }

  public function getRequest($key) {
    return $this->request[$key] ?? null;
  }

  protected function encodeRequest(): void
  {
    $this->validate->encodeUrl($this->request);
  }
}
