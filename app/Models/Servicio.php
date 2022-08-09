<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function belongToUser()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function belongToDriver()
    {
        return $this->belongsTo(User::class, 'user_conductor_id');
    }
}
