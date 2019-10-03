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
     
    return view('main', ['version' => $router->app->version() ]);
	
});

$router->group(['prefix' => 'api'], function () use ($router) {
	
  $router->get('cats',  ['uses' => 'CatController@getCats']);

  $router->get('cat/{id}', ['uses' => 'CatController@getCat']);

  $router->post('cat', ['uses' => 'CatController@createCat']);

  $router->delete('cat/{id}', ['uses' => 'CatController@deleteCat']);

  $router->put('cat/{id}', ['uses' => 'CatController@updateCat']);
  
  $router->put('feed/{id}', ['uses' => 'CatController@feedCat']);
  
});


