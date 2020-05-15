<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    protected $table = "banks";

    protected $fillable = ['bank_name'];


    public function transactions(){
        return $this->hasMany('App\Transaction');
    }
}
