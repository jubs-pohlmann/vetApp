<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  public function account(){
     return $this->hasOne('App\Account');
 }

 public function products(){
   return $this->hasMany('App\Product');
 }

 public function users(){
   return $this->belongsToMany('App\User');
 }
}
