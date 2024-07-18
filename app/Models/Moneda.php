<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moneda extends Model
{
    use HasFactory;

    public function valoresMonedas(){
        return $this->hasMany(MonedaValor::class,'moneda_id','id');
    }
}
