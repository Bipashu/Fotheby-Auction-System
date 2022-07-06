<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bid extends Model
{
    use HasFactory;
    public  function getCommission(){
        return $this->hasOne('App\Models\Commisssion');
    }
}
