<?php

namespace App;

use Illuminate\Support\Facades\Validator;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Http\Request;
use Laravel\Passport\HasApiTokens;
use Illuminate\Support\Facades\Storage;

use Client;
use Product;
use Store;

class User extends Authenticatable
{
  use Notifiable;
  use HasApiTokens;


  /**
    * The attributes that are mass assignable.
    *
    * @var array
  */
  protected $fillable = [
    'name', 'email', 'password',
  ];

  /**
   * The attributes that should be hidden for arrays.
   *
   * @var array
  */
  protected $hidden = [
    'password', 'remember_token',
  ];

  /**
   * The attributes that should be cast to native types.
   *
   * @var array
  */
  protected $casts = [
    'email_verified_at' => 'datetime',
  ];


  //Relacionamentos
  public function client(){
    return $this->hasOne('App\Client');
  }
  public function store(){
    return $this->hasOne('App\Store');
  }

  //Método responsável por criar um novo usuário
  public function createUser(Request $request){
    $this->name = $request->name;
    $this->email = $request->email;
    $this->password = bcrypt($request->password);
    $this->phone = $request->phone;
    $this->photo = $request->photo;
    $this->address = $request->address;
    $this->save();
  }

  //Método responsável por editar usuário
  public function updateUser(Request $request){
    if($request->name){
      $this->name = $request->name;
    }
    if($request->email){
      $this->email = $request->email;
    }
    if($request->password){
      $this->password = $request->password;
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
