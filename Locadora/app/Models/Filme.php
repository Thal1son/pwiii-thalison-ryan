<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filme extends Model
{
    protected $fillable = ['titulo', 'ano_lancamento', 'diretor', 'duracao', 'genero_id'];

    public function genero() {
        return $this->belongsTo(Genero::class);
    }
}