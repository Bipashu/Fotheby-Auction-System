<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    public function getBid(){
        return $this->hasMany('App\Models\Bid');
    }
    public  function getCommission(){
        return $this->hasOne('App\Models\Commission');
    }
    
}
