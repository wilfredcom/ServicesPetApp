<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class complementario_mascota extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function complementarioMascotasHasManyComplementarioMascotas()
    {
        return $this->hasMany(complementario_mascota::class, 'complementario_mascotas_id');
    }
}
