<?php

Route::get('/channel.html', function(){
  $cache_expire = 60*60*24*365;
  $contents = '<script src="//connect.facebook.net/' . Config::get('laravel-facebook::locale') . '/all.js"></script>';

  $response = \Response::make($contents, 200);
  $response->header('Pragma', 'public');
  $response->header('Cache-Control', 'max-age=' . $cache_expire);
  $response->header('Expires', gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');

  return $response;
});