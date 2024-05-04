<?php

declare(strict_types=1);

return [

  'GET' => [
    '/index' => 'controller:Frontend/Home/IndexController@home',
    '/home' => 'controller:home/index@home',
    '/contacts' => 'view:common/home'
  ],

  'POST' => [
    '/save' => 'controller:save@file',
    '/cc' => 'controller:gg@bg'
  ]

];
