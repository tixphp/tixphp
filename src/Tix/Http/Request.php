<?php

declare(strict_types=1);

namespace Tix\Http;

use AllowDynamicProperties;

#[AllowDynamicProperties] class Request
{
  public function __construct(
    protected array $request = []
  )
  {
    $this->request = $_REQUEST;
    $this->method = $_SERVER['REQUEST_METHOD'];
    $this->uri = $_SERVER['REQUEST_URI'];
  }

  /**
   * Get the HTTP request method (GET, POST, etc.).
   *
   * @return string The HTTP request method.
   */
  public function getMethod(): string
  {
    return $this->method;
  }

  /**
   * Get the value of a request parameter by key.
   *
   * @param string $key The key of the request parameter.
   * @return mixed|null The value of the request parameter or null if not found.
   */
  public function getParam(mixed $key): mixed
  {
    return $this->request[$key] ?? null;
  }

  /**
   * Get the URL parameters from the current request URI.
   *
   * @return array The URL parameters as an associative array.
   */
  public function getUriParams(): array
  {
    $parsedUrl = parse_url($this->uri);
    $query = $parsedUrl['query'] ?? '';

    parse_str($query, $params);

    foreach ($params as $key => $value) {
      $params[$key] = filter_var($value, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    }

    return $params;
  }

  /**
   * Parse the current URL and return its components.
   *
   * @return array The URL components as an associative array.
   */
  public function parseUrl(): array
  {
    $urlComponents = parse_url($this->getCurrentUrl());

    $scheme = $urlComponents['scheme'] ?? '';
    $host = $urlComponents['host'] ?? '';
    $path = $urlComponents['path'] ?? '';
    $query = $urlComponents['query'] ?? '';
    $fragment = $urlComponents['fragment'] ?? '';

    return [
      'scheme' => $scheme,
      'host' => $host,
      'path' => $path,
      'query' => $query,
      'fragment' => $fragment,
    ];
  }

  /**
   * Get the current full URL address including scheme, host, path, query, and fragment.
   *
   * @return string The current full URL address.
   */
  protected function getCurrentUrl(): string
  {
    $scheme = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http";
    $host = $_SERVER['HTTP_HOST'];
    $path = $_SERVER['REQUEST_URI'];
    $query = $_SERVER['QUERY_STRING'];
    $fragment = isset($_SERVER['HTTP_REFERER']) ? parse_url($_SERVER['HTTP_REFERER'], PHP_URL_FRAGMENT) : '';

    $url = $scheme . '://' . $host . $path;
    if (!empty($query)) {
      $url .= '?' . $query;
    }
    if (!empty($fragment)) {
      $url .= '#' . $fragment;
    }

    return $url;
  }

}
