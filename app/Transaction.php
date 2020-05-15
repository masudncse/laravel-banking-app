<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    protected $table = 'transactions';

    protected $fillable = ['description', 'deposit', 'withdraw', 'bank_id'];

    public function bank(){
        return $this->belongsTo('App\Bank');
    }
}
