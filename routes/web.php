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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->group(['prefix' => 'api'], function () use ($app) {
  // SELLERS
  $app->get('sellers', 'SellerController@index');
  $app->post('sellers', 'SellerController@store');
  $app->get('sellers/{id}', 'SellerController@show');
  $app->patch('sellers/{id}', 'SellerController@update');
  $app->delete('sellers/{id}', 'SellerController@destroy');

  // CUSTOMER
  $app->get('customers', 'CustomerController@index');
  $app->post('customers', 'CustomerController@store');
  $app->get('customers/{id}', 'CustomerController@show');
  $app->patch('customers/{id}', 'CustomerController@update');
  $app->delete('customers/{id}', 'CustomerController@destroy');

  // CUSTOMER
  $app->get('products', 'ProductController@index');
  $app->post('products', 'ProductController@store');
  $app->get('products/{id}', 'ProductController@show');
  $app->patch('products/{id}', 'ProductController@update');
  $app->delete('products/{id}', 'ProductController@destroy');

  $app->post('test','ProductController@test');
});
