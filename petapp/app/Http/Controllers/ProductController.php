<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\User;
class ProductController extends Controller
{
  //Método responsável por criar novo produto
  public function createProduct(Request $request){
    $product = new Product;
    $product->createProduct($request);
    return response()->json([$product]);
  }

  //Método que retorna lista com todos os produtos
  public function listProduct(){
    $product = Product::all();
    return response()->json([$product]);
  }

  //Método responsavel por exibir o produto com o id informado
  public function showProduct($id){
    $product = Product::findOrFail($id);
    return response()->json([$product]);
  }

  //Método usado para deletar um produto
  public function deleteProduct($id){
    Product::destroy($id);
    return response()->json(['Produto deletado']);
  }

  //Método para edição de dados do produto
  public function updateProduct(Request $request){
    $product = new Product;
    $product->updateProduct($request);
    return response()->json([$product]);

  }

  //
  // //Método responsavel por estabelecer uma relação entre produto e loja
  // public function addStore($id, $store_id){
  //   $product = Product::find($id);
  //   $product->store_id = store_id;
  //   $product->save();
  //   return response()->json(['Sucesso']);
  // }
  //
  // //Método responsavel por remover uma relação entre produto e loja
  // public function removeStore($id){
  //   $product = Product::find($id);
  //   $product->store_id = null;
  //   $product->save();
  //   return response()->json(['Sucesso']);
  // }
  //
  // //Método responsável por listar os clientes que compraram um produto
  // public function listUsers($id){
  //   $product = Product::find($id);
  //   return response()->json($product->users);
  // }

}
