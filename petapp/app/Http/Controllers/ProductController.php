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
  //Método usado para deletar um produto
  public function deleteProduct($id){
    Product::destroy($id);
    return response()->json(['Produto deletado']);
  }

  //Método responsavel por exibir o produto com o id informado
  public function showProduct($id){
    $product = Product::findOrFail($id);
    return response()->json([$product]);
  }

  //Método para edição de dados do produto
  public function updateProduct(Request $request, $product_id){
    $product = Product::findOrFail($product_id);
    $product->updateProduct($request);
    return response()->json([$product]);
  }

  //Método responsável por listar os clientes que compraram um produto
  public function listClient($id){
    $product = Product::findOrFail($id);
    return response()->json($product->clients);
  }

  //Método responsável por exibir a foto do produto
  public function showPhoto($id){
    $product = Product::findOrFail($id);
    $path = $product->photo;
    return Storage::download($path);
  }

  //Método responsável por ordenar os produtos do forma decrescente
  public function orderBy(){
    $desc = Product::orderBy('id', 'desc')->get();
    return response()->json([$desc]);
  }

  //Método responsável por ordenar os produtos por animal
  public function animal($animal){
    $string = Product::where('animal', $animal)->get();
    return response()->json([$string]);
  }

  //Método responsável por ordenar os produtos por categoria
  public function category($categoria){
    $string = Product::where('category', $categoria)->get();
    return response()->json([$string]);
  }
}
