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
Route::get('listProduct/{id}', 'ClientController@listProduct');  //admin ter acesso ao histórico de compras de um cliente
Route::get('listRate/{id}', 'ClientController@listRate');  //admin ter acesso ao histórico avaliações do cliente



//Rotas Store
Route::get('listStore', 'StoreController@listStore');
Route::get('showStore/{id}', 'StoreController@showStore');
Route::get('listRate/{id}', 'StoreController@listRate'); //admin ter acesso ao histórico avaliações da loja

//Rotas Product
Route::get('listProduct', 'ProductController@listProduct');
Route::get('showProduct/{id}', 'ProductController@showProduct');
Route::put('updateProduct/{id}', 'ProductController@updateProduct');
Route::delete('deleteProduct/{id}', 'ProductController@deleteProduct');
Route::get('listClient/{id}', 'ProductController@listClient'); //lista os clientes que compraram um produto
Route::get('showPhotoProduct/{id}', 'ProductController@showPhoto');
Route::get('orderBy', 'ProductController@orderBy');
Route::get('animal/{string}', 'ProductController@animal');
Route::get('category/{string}', 'ProductController@category');

//Rotas User
Route::get('listUser', 'UserController@listUser');
Route::get('showUser', 'UserController@showUser');
Route::delete('deleteUser/{id}', 'UserController@deleteUser');
Route::get('showPhoto/{id}', 'UserController@showPhoto');

Route::post('registerStore', 'API\PassportController@registerStore');
Route::post('registerClient', 'API\PassportController@registerClient');
Route::post('login', 'API\PassportController@login');
Route::group(['middleware'=> 'auth:api'], function(){
    Route::get('logout', 'API\PassportController@logout');
    Route::put('sale/{id}', 'API\PassportController@sale');
    Route::put('createProduct', 'API\PassportController@createProduct');
    Route::post('getDetails', 'API\PassportController@getDetails');
    Route::put('updateClient', 'API\PassportController@updateClient');
    Route::put('updateStore', 'API\PassportController@updateStore');
    Route::get('listMyProduct', 'API\PassportController@listProduct'); //cliente ter acesso ao seu histórico de compras
    Route::put('rate/{store_id}/{grade}', 'API\PassportController@rate');
    Route::get('listRate', 'API\PassportController@listRate');//cliente ter acesso ao seu histórico avaliações
    Route::get('listRateStore', 'API\PassportController@listRateStore');//store ter acesso ao seu histórico avaliações
});
