<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Passport\HasApiTokens;

class Store extends Model
{
  //Relacionamentos
  use HasApiTokens;
  public function super(){
   return $this->hasOne('App\Super');
  }

  public function products(){
   return $this->hasMany('App\Product');
  }

  public function users(){
   return $this->belongsToMany('App\User');
  }

  //Método responsável por criar nova loja
  public function createStore($request){
   $super = new Super;
   $super->createSuper;
   $this->cnpj = $request->cnpj;
   $this->delivery = $request->delivery;
   $this->super()->attach($super);
   $this->save();
  }

  //Método para edição de dados da loja
  public function updateStore($request){
   $super = Store::find($this->super_id);
   $super->updateSuper;
   if($request->rating){
     $this->rating = $request->rating;
   }
   if($request->delivery){
     $this->delivery = $request->delivery;
   }
   if($request->cnpj){
     $this->cnpj = $request->cnpj;
   }
   $this->save();
 }

}
