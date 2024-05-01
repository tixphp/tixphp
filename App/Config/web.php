<?php

declare(strict_types=1);

return [

  'GET' => [
    '/home' => 'controller:index@home',
    '/contacts' => 'view:common/home'
  ],

  'POST' => [
    '/save' => 'controller:save@file',
    '/cc' => 'controller:gg@bg'
  ]

];
