<?php

use Dingo\Api\Routing\Router;

$router = app(Router::class);

$router->version('v1', function (Router $router){
    $router->group(['namespace'=>'App\Http\Controllers'], function(Router $router){
        $router->get('test','ServerController@test');
    });
});