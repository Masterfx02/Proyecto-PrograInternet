<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class disco extends Model
{
    use HasFactory;

    protected $fillable = ['titulo', 'artista', 'genero', 'precio', 'stock'];
}
