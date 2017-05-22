<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thread extends Model
{
    public function user() {
      return $this->belongsTo('App\User');
    }
}
