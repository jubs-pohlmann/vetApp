<?php

namespace App;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use User;
use Store;

class Client extends Model
{

  //Relacionamentos
  public function user(){ //herança
    return $this->belongsTo('App\User');
  }

  public function products(){
    return $this->belongsToMany('App\Product');
  }

  public function stores(){
    return $this->belongsToMany('App\Store')
      ->withPivot('grade');
  }


  //Método responsável por criar um novo client
  public function createClient(Request $request){
    $this->birthdate = $request->birthdate;
    $this->cpf = $request->cpf;
    $this->save();
  }

  //Método para edição de dados do client
  public function updateClient(Request $request){
    if($request->birthdate){
      $this->birthdate = $request->birthdate;
    }
    if($request->cpf){
      $this->cpf = $request->cpf;
    }
    $this->save();
  }


  //Método responsável por representar a compra de um produto por cliente
  public function sale($product_id){
    $product = Product::find($product_id);
    $this->products()->attach($product);
  }



}
