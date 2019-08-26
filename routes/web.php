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

    return 'Welcome';
});

$router->group(['prefix' => 'api'], function () use ($router) {


    // Department route
    $router->get('/department', 'DepartmentController@index');
    $router->post('/department/store', 'DepartmentController@store');
    $router->put('/department/update', 'DepartmentController@update');
    $router->put('/department/delete', 'DepartmentController@delete');

    // Guess route
    $router->get('/guest', 'GuestController@index');
    $router->post('/guest/store', 'GuestController@store');
    $router->put('/guest/time-out', 'GuestController@timeOut');
    $router->put('/guest/update', 'GuestController@update');
    $router->put('/guest/delete', 'GuestController@delete');

    // Staff route
    $router->get('/staff', 'StaffController@index');
    $router->post('/staff/store', 'StaffController@store');
    $router->put('/staff/update', 'StaffController@update');
    $router->put('/staff/delete', 'StaffController@delete');

});
