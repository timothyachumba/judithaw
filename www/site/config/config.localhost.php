<?php

return [
  'debug' => true,
  'cache' => false,

  // The code below is required for the kirby-webpack dev server to work
  // 'url' => function () {
  //   if (isset($_SERVER['HTTP_X_FORWARDED_FOR']) && $_SERVER['HTTP_X_FORWARDED_FOR'] === 'webpack') {
  //     return $_SERVER['HTTP_X_FORWARDED_PROTO'] . '://' . $_SERVER['HTTP_X_FORWARDED_HOST'];
  //   }
  // return false;
  // }

  'url' => [
    'http://192.168.1.22:3000/',
    'http://localhost:3000/'

  ],
  'routes' => [
      [
        'pattern' => '(:any)',
        'action'  => function($uid) {

          $page = page($uid);
          if(!$page) $page = page('home/' . $uid);
          if(!$page) $page = site()->errorPage();

          return site()->visit($page);
        }
      ],
      [
        'pattern' => 'home/(:any)',
        'action'  => function($uid) {
          go($uid);
        }
      ],
    ]

    
  
];
