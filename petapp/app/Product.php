<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Store;
use User;

class Product extends Model
{
  //Relacionamentos
  public function store(){
    return $this->belongsTo('App\Store');
  }

  public function clients(){
    return $this->belongsToMany('App\Client')
      ->withPivot('delivery_day');
  }


  //Método responsável por criar novo produto
  public function createProduct(Request $request, $store_id){
    $this->name = $request->name;
    $this->price = $request->price;
    $this->category = $request->category;
    $this->description = $request->description;
    $this->animal = $request->animal;
    $this->stock = $request->stock;
    $this->store_id = $store_id;
    if($request->photo){
      if(!Storage::exists('localProductPhotos/'))
        Storage::makeDirectory('localProductPhotos/',0775,true);
      $file = $request->file('photo');
      $filename = $this->id.'.'.$file->getClientOriginalExtension();
      $path = $file->storeAs('localProductPhotos', $filename);
      $this->photo = $path;
    }

    $this->save();
  }


  //Método para edição de dados do produto
  public function updateProduct($request){
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
    if($request->animal){
      $this->animal = $request->animal;
    }
    if($request->photo){
      if(!Storage::exists('localProductPhotos/'))
        Storage::makeDirectory('localProductPhotos/',0775,true);
      $file = $request->file('photo');
      $filename = $this->id.'.'.$file->getClientOriginalExtension();
      $path = $file->storeAs('localProductPhotos', $filename);
      $this->photo = $path;
    }
    $this->save();
  }
}
