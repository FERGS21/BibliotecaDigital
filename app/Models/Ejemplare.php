<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ejemplare extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_libro',
        'copia',
        'cantidad',
    ];

    public function libro()
    {
        return $this->belongsTo(libro::class,'id_libro');
    }

    public function prestamo()
    {
        return $this->HasMany(Prestamo::class);
    }

}
