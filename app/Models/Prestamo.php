<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_libro',
        'ejemplare_id',
        'id_usuario',
        'fecha_prestamo',
        'fecha_devolucion',
    ];

    public function libro()
    {
        return $this->belongsTo(Libro::class,'id_libro');
    }
    public function ejemplar()
    {
        return $this->belongsTo(Ejemplare::class,'ejemplare_id');
    }
    public function usuario ()
    {
        return $this->belongsTo(User::class,'id_usuario');
    }
}
