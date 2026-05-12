<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genero;
use App\Models\Filme;

class LocadoraController extends Controller
{
    // Função que abre a página inicial
    public function index() 
    {
        $generos = Genero::with('filmes')->orderBy('nome', 'asc')->get();
        return view('locadora', compact('generos'));
    }

    // Função que salva o filme no banco
    public function store(Request $request) 
    {
        $request->validate([
            'genero_nome'    => 'required|min:3',
            'filme_titulo'   => 'required',
            'filme_ano'      => 'required|numeric|min:1895',
            'filme_diretor'  => 'required',
            'filme_duracao'  => 'required|numeric'
        ]);

        // Busca ou cria o gênero
        $genero = Genero::firstOrCreate(['nome' => $request->genero_nome]);

        // Cria o filme vinculado ao gênero
        Filme::create([
            'titulo' => $request->filme_titulo,
            'ano_lancamento' => $request->filme_ano,
            'diretor' => $request->filme_diretor,
            'duracao' => $request->filme_duracao,
            'genero_id' => $genero->id
        ]);

        return back()->with('success', 'Filme cadastrado com sucesso!');
    }
}