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
$router->get('/books',['uses' => 'UserController@getUsers']);
$router->post('/books', 'UserController@add'); // create new user record
$router->get('/books/{bookid}', 'UserController@show'); // get user by id
$router->put('/books/{bookid}', 'UserController@update'); // update user record
$router->patch('/books/{bookid}', 'UserController@update'); // update user record
$router->delete('/books/{bookid}', 'UserController@delete'); // delete record

//user subject

$router->get('/author','UsersubjectController@getUsers');
$router->get('/author/{authorid}','UsersubjectController@show'); // get user by id
$router->put('/author/{authorid}', 'UsersubjectController@update'); // update user record
$router->patch('/author/{authorid}', 'UsersubjectController@update'); // update user record
$router->delete('/author/{authorid}', 'UsersubjectController@delete'); // delete record
$router->post('/author', 'UsersubjectController@add'); // create new user record