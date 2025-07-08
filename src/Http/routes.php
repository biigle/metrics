<?php

$router->post('api/v1/events', [
   'middleware' => ['auth', 'session'],
   'uses' => 'EventsController@store',
]);
