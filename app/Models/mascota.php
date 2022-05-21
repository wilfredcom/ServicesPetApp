<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mascota extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function belongsToCliente()
    {
        return $this->belongsTo(cliente::class,'id');
    }

    public function hasOneTipo()
    {
        return $this->hasOne(tipo_mascota::class, 'mascota_id');
    }

    public function hasManyComplementarioMascota()
    {
        return $this->hasMany(complementario_mascota::class, 'mascotas_id');
    }
}
