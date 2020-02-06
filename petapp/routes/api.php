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


//Rotas User
Route::get('listarClientes', 'UserController@listUser');
Route::get('mostrarCliente/{id}', 'UserController@showUser');
Route::post('criarCliente', 'UserController@createUser');
Route::put('atualizarCliente', 'UserController@updateUser');
Route::delete('deletarCliente/{id}', 'UserController@deleteUser');

Route::put('adicionarCartao/{id}/{card_id}', 'UserController@addCard');
Route::put('removerCartao/{id}', 'UserController@removeCard');

Route::get('listarProdutos/{id}', 'UserController@listProducts');

Route::put('avaliar/{id}/{store_id}/{grade}', 'UserController@rate');
Route::get('listarLojaAv/{id}', 'UserController@listRate');

Route::post('register', 'API\PassportController@register');
Route::post('login', 'API\PassportController@login');
Route::group(['middleware'=> 'auth.api'], function(){
    Route::get('logout', 'API\PassportController@logout');
    Route::post('getDetails', 'API\PassportController@getDetails');

});


//Rotas Store
Route::get('listarLojas', 'StoreController@listStore');
Route::get('mostrarLoja/{id}', 'StoreController@showStore');
Route::post('criarLoja', 'StoreController@createStore');
Route::put('atualizarLoja', 'StoreController@updateStore');
Route::delete('deletarLoja/{id}', 'StoreController@deleteStore');

Route::put('adicionarConta/{id}/{account_id}', 'StoreController@addAccount');
Route::put('removerConta/{id}', 'StoreController@removeAccount');

Route::get('listarClienteAv/{id}', 'StoreController@listClients');

//Rotas Product
Route::get('listarProdutos', 'ProductController@listProduct');
Route::get('mostrarProduto/{id}', 'ProductController@showProduct');
Route::post('criarProduto', 'ProductController@createProduct');
Route::put('atualizarProduto', 'ProductController@updateProduct');
Route::delete('deletarProduto/{id}', 'ProductController@deleteProduct');

Route::put('adicionarLoja/{id}/{store_id}', 'ProductController@addStore');
Route::put('removerLoja/{id}', 'ProductController@removeStore');

Route::get('listarClientes/{id}', 'ProductController@listClients');
Route::put('compra/{user_id}/{id}', 'ProductController@sale');


//Rotas Account
Route::get('listarContas', 'AccountController@listAccount');
Route::get('mostrarConta/{id}', 'AccountController@showAccount');
Route::post('criarConta', 'AccountController@createAccount');
Route::put('atualizarConta', 'AccountController@updateAccount');
Route::delete('deletarConta/{id}', 'AccountController@deleteAccount');

//Rotas Card
Route::get('listarCartoes', 'CardController@listCard');
Route::get('mostrarCartao/{id}', 'CardController@showCard');
Route::post('criarCartao', 'CardController@createCard');
Route::put('atualizarCartao', 'CardController@updateCard');
Route::delete('deletarCartao/{id}', 'CardController@deleteCard');
