<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonedaValor extends Model
{
    use HasFactory;

    public function moneda(){
        return $this->belongsTo(Moneda::class,'moneda_id','id');
    }
}
