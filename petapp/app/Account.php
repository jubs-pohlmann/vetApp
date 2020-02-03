<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
  public function store(){
    return $this->belongsTo('App\Store');
  }
}
