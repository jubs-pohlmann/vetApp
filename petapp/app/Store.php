<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
  public function account(){
     return $this->hasOne('App\Account');
 }
}
