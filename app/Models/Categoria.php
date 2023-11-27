<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    public function Notas(){
        return $this->hasmany(Nota::class);
        
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    protected $fillable = ['nombre_categoria', 'user_id'];
}
