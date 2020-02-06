<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  //Relacionamentos
  public function store(){
    return $this->belongsTo('App\Store');
  }

  public function users(){
    return $this->belongsToMany('App\User');
  }


  //Método responsável por criar novo produto
  public function createProduct($request){
    $this->name = $request->name;
    $this->photo = $request->photo;
    $this->price = $request->price;
    $this->category = $request->category;
    $this->description = $request->description;
    $this->animal = $request->animal;
    $this->stock = $request->stock;
    $this->status_stock = $request->status_stock;
    $this->save();
  }


  //Método para edição de dados do produto
  public function updateProduct($request, $id){
    if($request->name){
      $this->name = $request->name;
    }
    if($request->photo){
      $this->photo = $request->photo;
    }
    if($request->price){
      $this->price = $request->price;
    }
    if($request->category){
      $this->category = $request->category;
    }
    if($request->description){
      $this->description = $request->description;
    }
    if($request->stock){
      $this->stock = $request->stock;
    }
    if($request->status_stock){
      $this->status_stock = $request->status_stock;
    }
    if($request->animal){
      $this->animal = $request->animal;
    }
    $this->save();
  }
}
