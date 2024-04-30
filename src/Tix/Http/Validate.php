<?php

declare(strict_types=1);

namespace Tix\Http;

class Validate
{
  public function encodeUrl(array $request = []): void {
    foreach ($request as $key => $value) {
      $request[$key] = $this->encodeValue($value);
    }
  }

  private function encodeValue(string $value): string {
    return urlencode($value);
  }
}
