<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    public function account_type(){

        return $this->hasMany(AccountTypes::class,'bank_id');
    }
}
