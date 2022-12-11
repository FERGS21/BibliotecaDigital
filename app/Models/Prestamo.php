<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ejemplar',
        'id_usuario',
    ];

    public function ejemplar()
    {
        return $this->belongsTo(Ejemplare::class,'id_ejemplar');
    }
    public function usuario ()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }
}
