<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

$router->group(['middleware' => ['auth', 'verified']], function () use ($router) {
    $router->post('/logout', 'AuthController@logout');
    $router->get('/user', 'AuthController@user');
    $router->post('/email/request-verification', ['as' => 'email.request.verification', 'uses' => 'AuthController@emailRequestVerification']);
    $router->post('/refresh', 'AuthController@refresh');
    $router->post('/deactivate', 'AuthController@deactivate');
  });
  $router->post('/register', 'AuthController@register');
  $router->post('/login', 'AuthController@login');
  $router->post('/reactivate', 'AuthController@reactivate');
  $router->post('/password/reset-request', 'RequestPasswordController@sendResetLinkEmail');
  $router->post('/password/reset', [ 'as' => 'password.reset', 'uses' => 'ResetPasswordController@reset' ]);
  $router->post('/email/verify', ['as' => 'email.verify', 'uses' => 'AuthController@emailVerify']);
