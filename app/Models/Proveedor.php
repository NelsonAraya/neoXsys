<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    public function banco(){
        return $this->belongsTo(Banco::class,'banco_id','id');
    }
    public function bancoCuentaTipo(){
        return $this->belongsTo(BancoCuentaTipo::class,'banco_cuenta_tipo_id','id');
    }
    public function getRunCompletoAttribute() {
        return number_format($this->id, 0,'.','.') . '-' . $this->dv;
    }
}
