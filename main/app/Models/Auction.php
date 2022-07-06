<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Auction extends Model
{
    use HasFactory;
    public function getCatalogue(){
        return $this->hasOne('App\Models\Catalogue');
    }
}
