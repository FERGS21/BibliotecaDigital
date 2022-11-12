<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignaautore extends Model
{
    use HasFactory;
    protected $fillable = [
    'id_libro',
    'id_autor',
    ];
    public function libro()
    {
        return $this->belongsTo(Libro::class,'id_libro');
    }

    public function autor()
    {
        return $this->belongsTo(Autore::class,'id_autor');
    }
}
