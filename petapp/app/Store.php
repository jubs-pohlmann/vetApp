<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

use User;
use Client;
use Product;

class Store extends Model
{

  //Relacionamentos
  public function user(){   //herança
   return $this->belongsTo('App\User');
  }

  public function products(){
   return $this->hasMany('App\Product');
  }

  public function clients(){
   return $this->belongsToMany('App\Client');
  }

  //Método responsável por criar nova loja
  public function createStore(Request $request){
    $this->delivery = $request->delivery;
    $this->cnpj = $request->cnpj;
    $this->save();
  }

  //Método para edição de dados da loja
  public function updateStore($request){
   $user = Store::find($this->user_id);
   $user->updateuser;
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
