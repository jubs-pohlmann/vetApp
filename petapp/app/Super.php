<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Super extends Model
{

  //Relacionamentos
  public function user(){
    return $this->belongsTo('App\User');
  }
  public function store(){
    return $this->belongsTo('App\Store');
  }

  //Método responsável por criar um novo usuário super
  public function createSuper($request){

    $this->name = $request->name;
    $this->email = $request->email;
    $this->password = $request->password;
    $this->phone = $request->phone;
    $this->photo = $request->photo;
    $this->address = $request->address;
    $this->save();
  }

  //Método responsável por editar usuário super
  public function updateSuper($request){

    if($request->name){
      $this->name = $request->name;
    }
    if($request->email){
      $this->email = $request->email;
    }
    if($request->password){
      $this->password = $request->password;
    }
    if($request->photo){
      $this->photo = $request->photo;
    }
    if($request->phone){
      $this->phone = $request->phone;
    }
    if($request->address){
      $this->address = $request->address;
    }
    $this->save();
  }
}
