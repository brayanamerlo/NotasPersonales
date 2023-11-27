<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function categoria(){
        return $this->belongsTo(Categoria::class);
    }

    protected $fillable = [
        'titulo', 'contenido', 'fecha_creacion', 'etiqueta', 'color', 'categoria_id', 'user_id',
    ];
}
