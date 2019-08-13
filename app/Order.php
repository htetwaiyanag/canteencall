<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{

    
    protected $fillable = ['status'];

    public function users(){
        return $this->belongsTo('App\User');
    }
}
