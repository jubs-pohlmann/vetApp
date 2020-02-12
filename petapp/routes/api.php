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
Route::get('listProductAdmin/{id}', 'ClientController@listProductAdmin');  //admin ter acesso ao histórico de compras de um cliente
Route::get('listRateAdmin/{id}', 'ClientController@listRateAdmin');  //admin ter acesso ao histórico avaliações do cliente



//Rotas Store
Route::get('listStore', 'StoreController@listStore');
Route::get('showStore/{id}', 'StoreController@showStore');
Route::get('listProductAdmin/{id}', 'StoreController@listProductAdmin');  //admin ter acesso ao histórico de produtos de uma loja
Route::get('listRateAdmin/{id}', 'StoreController@listRateAdmin'); //admin ter acesso ao histórico avaliações da loja

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
    Route::post('getDetails', 'API\PassportController@getDetails');
    Route::put('sale/{id}', 'ClientController@sale');
    Route::put('createProduct', 'StoreController@createProduct');
    Route::put('updateClient', 'ClientController@updateClient');
    Route::put('updateStore', 'StoreController@updateStore');
    Route::get('listProductClient', 'ClientController@listProduct'); //cliente ter acesso ao seu histórico de compras
    Route::get('listProductStore', 'StoreController@listProduct'); //loja ter acesso ao seu histórico de produtos
    Route::put('rate/{store_id}/{grade}', 'ClientController@rate');
    Route::get('listRateClient', 'ClientController@listRate');//cliente ter acesso ao seu histórico avaliações
    Route::get('listRateStore', 'StoreController@listRate');//store ter acesso ao seu histórico avaliações
});
