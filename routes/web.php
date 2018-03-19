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

$router->get('/categories',['uses'=>'CategoryController@showAll']);
$router->post('/category',['uses' =>'CategoryController@createCategory']);
$router->get('/category/{id}',['uses' => 'CategoryController@showCategory']);
$router->put('/category/{id}',['uses' => 'CategoryController@updateCategory']);
$router->delete('/category/{id}',['uses' => 'CategoryController@deleteCategory']);

$router->get('/pleasures',['uses'=>'PleasureController@showAll']);
$router->post('/pleasure',['uses' =>'PleasureController@createPleasure']);
$router->get('/pleasure/{id}',['uses' => 'PleasureController@showPleasure']);
$router->put('/pleasure/{id}',['uses' => 'PleasureController@updatePleasure']);
$router->delete('/pleasure/{id}',['uses' => 'PleasureController@deletePleasure']);
