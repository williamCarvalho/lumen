<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->get('/drones', 'DroneController@index');
$router->post('/drones', 'DroneController@insert');
$router->put('/drones/{id}', 'DroneController@update');
$router->delete('/drones/{id}', 'DroneController@delete');
$router->post('/drones/{id}', 'DroneController@create');
