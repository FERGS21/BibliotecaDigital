<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'libro_id',   
    ];

    public function libros() {
        return $this->belongsToMany(Libro::class);
    }
}
