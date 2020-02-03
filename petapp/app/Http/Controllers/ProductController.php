<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
class ProductController extends Controller
{
  //Método responsável por criar novo produto
  public function createProduct(Request $request){

    $product = new Product;

    $product->name = $request->name;
    $product->photo = $request->photo;
    $product->price = $request->price;
    $product->category = $request->category;
    $product->description = $request->description;
    $product->animal = $request->animal;
    $product->stock = $request->stock;
    $product->status_stock = $request->status_stock;
    $product->save();

    return response()->json([$product]);
  }

  //Método que retorna lista com todos os produtos
  public function listProduct(){
    $product = Product::all();
    return response()->json($product);
  }

  //Método responsavel por exibir o produto com o id informado
  public function showProduct($id){
    $product = Prooduct::findOrFail($id);
    return response()->json([$product]);
  }

  //Método usado para deletar um produto
  public function deleteProduct($id){
    Product::destroy($id);
    return response()->json(['Produto deletado']);
  }

  //Método para edição de dados do produto
  public function updateProduct(Request $request, $id){
    $product = Product::find($id);
    if($product){
      if($request->name){
        $product->name = $request->name;
      }
      if($request->photo){
        $product->photo = $request->photo;
      }
      if($request->price){
        $product->price = $request->price;
      }
      if($request->category){
        $product->category = $request->category;
      }
      if($request->description){
        $product->description = $request->description;
      }
      if($request->stock){
        $product->stock = $request->stock;
      }
      if($request->status_stock){
        $product->status_stock = $request->status_stock;
      }
      if($request->animal){
        $product->animal = $request->animal;
      }
      $product->save();
      return response()->json([$product]);
    }
    else{
      return response()->json(['Este produto nao existe']);
    }
  }

}
