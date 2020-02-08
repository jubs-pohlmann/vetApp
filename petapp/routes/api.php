<?php

use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//Rotas Client
Route::get('listClient', 'ClientController@listClient');
Route::get('showClient/{id}', 'ClientController@showClient');

// Route::get('listarProdutos/{id}', 'UserController@listProducts');
//
// Route::put('avaliar/{id}/{store_id}/{grade}', 'UserController@rate');
// Route::get('listarLojaAv/{id}', 'UserController@listRate');


//Rotas Store
Route::get('listStore', 'StoreController@listStore');
Route::get('showStore/{id}', 'StoreController@showStore');

//Route::get('listarUserAv/{id}', 'StoreController@listClients');

//Rotas Product
Route::get('listProduct', 'ProductController@listProduct');
Route::get('showProduct/{id}', 'ProductController@showProduct');
Route::post('createProduct', 'ProductController@createProduct');
Route::put('updateProduct', 'ProductController@updateProduct');
Route::delete('deleteProduct/{id}', 'ProductController@deleteProduct');

// Route::put('adicionarLoja/{id}/{store_id}', 'ProductController@addStore');
// Route::put('removerLoja/{id}', 'ProductController@removeStore');
//
// Route::get('listarUsers/{id}', 'ProductController@listClients');




//Rotas User
Route::get('listUser', 'UserController@listUser');
Route::get('showUser', 'UserController@showUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');

Route::post('registerStore', 'API\PassportController@registerStore');
Route::post('registerClient', 'API\PassportController@registerClient');
Route::post('login', 'API\PassportController@login');
Route::group(['middleware'=> 'auth:api'], function(){
    Route::get('logout', 'API\PassportController@logout');
    Route::put('sale/{id}', 'API\PassportController@sale');
    Route::post('getDetails', 'API\PassportController@getDetails');
    Route::put('updateClient', 'API\PassportController@updateClient');
    Route::put('updateStore', 'API\PassportController@updateStore');
});
