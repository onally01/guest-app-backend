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

// database to the application
//$DATABASE_URL = parse_url('postgres://dvjmyinbwjplmh:f2087a0e6e9789de6e934be2e3ccbfba02a070ed3e6f0acdd6e2b75c028449a5@ec2-184-73-169-163.compute-1.amazonaws.com:5432/da9u6sr8ti4p0o');


$router->get('/', function () use ($router) {

//    dd($DATABASE_URL);
    return 'Welcome';
    //    return $router->app->version();

});
