<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use Notifiable;

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
    public function super(){
      return $this->hasOne('App\Super');
    }

    public function products(){
      return $this->belongsToMany('App\Product');
    }

    public function stores(){
      return $this->belongsToMany('App\Store')
        ->withPivot('grade');
    }


    //Método responsável por criar um novo user
    public function createUser($request){
      $super = new Super();
      $super->createSuper;
      $this->birthdate = $request->birthdate;
      $this->cpf = $request->cpf;
      $this->super()->attach($super);
      $this->save();
    }

    //Método para edição de dados do user
    public function updateUser($request){
      $super = User::find($this->super_id);
      $super->updateSuper;

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
