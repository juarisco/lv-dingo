<?php

use Dingo\Api\Routing\Router;

$router = app(Router::class);

$router->version('v1', function (Router $router) {
    $router->group(['namespace' => 'App\Http\Controllers'], function (Router $router) {
        $router->group(['prefix' => 'status'], function (Router $router) {
            $router->get('ping', 'ServerController@ping');
            $router->get('version', 'ServerController@version');
        });

        $router->resource('users', 'UserController');

        // Auth routes
        $router->group(['prefix' => 'auth'], function (Router $router) {
            $router->post('login', 'Auth\AuthController@login');
            $router->patch('refresh', 'Auth\AuthController@refreshToken');
            $router->delete('invalidate', 'Auth\AuthController@deleteInvalidate');
            $router->post('register', 'Auth\AuthController@register');

            $router->group(['middleware' => ['api.auth']], function (Router $router) {
                $router->get('user', 'Auth\AuthController@getUser');
            });
        });
    });

    // $router->group(['prefix' => 'weather'], function (Router $router) {
    //     $router->get('city/{city}/current', 'QueryController@current');
    //     $router->get('city/{city}/all', 'QueryController@all');
    // });
});
