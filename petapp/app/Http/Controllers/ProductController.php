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

  //Método responsável por ordenar os produtos por animal - cats
  public function cats(){
    $cats = Product::where('animal', 'cats')->get();
    return response()->json([$cats]);
  }

  //Método responsável por ordenar os produtos por animal - dogs
  public function dogs(){
    $dogs = Product::where('animal', 'dogs')->get();
    return response()->json([$dogs]);
  }

  //Método responsável por ordenar os produtos por animal - fishes
  public function fishes(){
    $fishes = Product::where('animal', 'fishes')->get();
    return response()->json([$fishes]);
  }

  //Método responsável por ordenar os produtos por animal - birds
  public function birds(){
    $birds = Product::where('animal', 'birds')->get();
    return response()->json([$birds]);
  }

  //Método responsável por ordenar os produtos por categoria
  public function accessories(){
    $accessories = Product::where('category', 'accessories')->get();
    return response()->json([$accessories]);
  }

  //Método responsável por ordenar os produtos por categoria
  public function health(){
    $health = Product::where('category', 'health')->get();
    return response()->json([$health]);
  }

  //Método responsável por ordenar os produtos por categoria
  public function food(){
    $food = Product::where('category', 'food')->get();
    return response()->json([$food]);
  }

  //Método responsável por ordenar os produtos por categoria
  public function bath(){
    $bath = Product::where('category', 'bath')->get();
    return response()->json([$bath]);
  }
}
