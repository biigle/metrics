<?php

$router->post('api/v1/events', [
   'middleware' => ['auth', 'session'],
   'uses' => 'EventsController@store',
]);

$router->get('admin/metrics', [
   'as' => 'admin-metrics',
   'middleware' => ['auth', 'can:sudo'],
   'uses' => 'AdminController@index',
]);
