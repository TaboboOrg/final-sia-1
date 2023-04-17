<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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
$router->get('/courses',['uses' => 'UserController@getUsers']);
$router->post('/courses', 'UserController@add'); // create new user record
$router->get('/courses/{course_id}', 'UserController@show'); // get user by id
$router->put('/courses/update/{course_id}', 'UserController@update'); // update user record
$router->patch('/courses/patch/{course_id}', 'UserController@update'); // update user record
$router->delete('/courses/delete/{course_id}', 'UserController@delete'); // delete record