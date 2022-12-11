<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    
    protected $fillable = [
        'titulo',
        'no_paginas',
        'isbn',
        'anio_edicion',
        'id_editorial',
        'id_edicion',
        'id_area',
    ];

    public function editorial()
    {
        return $this->belongsTo(Editoriale::class,'id_editorial');
    }

    public function edicion()
    {
        return $this->belongsTo(Edicione::class,'id_edicion');
    }

    public function area()
    {
        return $this->belongsTo(Area::class,'id_area');
    }
    public function autores(){
        return $this->belongsToMany(Autore::class);
    }
}
