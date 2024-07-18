<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fondo extends Model
{
    use HasFactory;
    public function departamento(){
        return $this->belongsTo(departamento::class,'departamento_id','id');
    }
}
