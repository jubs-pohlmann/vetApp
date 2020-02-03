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
Route::get('listarClientes', 'ClientController@listClient');
Route::get('mostrarCliente/{id}', 'ClientController@showClient');
Route::post('criarCliente', 'ClientController@createClient');
Route::put('atualizarCliente/{id}', 'ClientController@updateClient');
Route::delete('deletarCliente/{id}', 'ClientController@deleteClient');

//Rotas Store
Route::get('listarLojas', 'StoreController@listStore');
Route::get('mostrarLoja/{id}', 'StoreController@showStore');
Route::post('criarLoja', 'StoreController@createStore');
Route::put('atualizarLoja/{id}', 'StoreController@updateStore');
Route::delete('deletarLoja/{id}', 'StoreController@deleteStore');

//Rotas Product
Route::get('listarProdutos', 'ProductController@listProduct');
Route::get('mostrarProduto/{id}', 'ProductController@showProduct');
Route::post('criarProduto', 'ProductController@createProduct');
Route::put('atualizarProduto/{id}', 'ProductController@updateProduct');
Route::delete('deletarProduto/{id}', 'ProductController@deleteProduct');

//Rotas Account
Route::get('listarContas', 'AccountController@listAccount');
Route::get('mostrarConta/{id}', 'AccountController@showAccount');
Route::post('criarConta', 'AccountController@createAccount');
Route::put('atualizarConta/{id}', 'AccountController@updateAccount');
Route::delete('deletarConta/{id}', 'AccountController@deleteAccount');

//Rotas Card
Route::get('listarCartoes', 'CardController@listCard');
Route::get('mostrarCartao/{id}', 'CardController@showCard');
Route::post('criarCartao', 'CardController@createCard');
Route::put('atualizarCartao/{id}', 'CardController@updateCard');
Route::delete('deletarCartao/{id}', 'CardController@deleteCard');
