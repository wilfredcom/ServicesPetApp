<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cliente extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function hasOneMascota()
    {
        return $this->hasOne(mascota::class, 'cliente_id');
    }
     
    public function hasManyComplementarioCliente()
    {
        return $this->hasMany(complementario_cliente::class, 'cliente_id');
    }
}
