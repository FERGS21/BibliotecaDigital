<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autore extends Model
{
    use HasFactory;
    protected $fillable = ['nombre',
        'ap',
        'am',
    ];

    public function libros(){
        return $this->belogsToMaty(Autore::class);
    }
}
