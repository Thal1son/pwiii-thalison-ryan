<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Locadora de Filmes</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 900px; margin: 40px auto; padding: 0 20px; background: #f5f5f5; }
        h1 { color: #333; border-bottom: 2px solid #333; padding-bottom: 10px; }
        h2 { color: #555; margin-top: 30px; }

        form { background: white; padding: 20px; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        label { display: block; margin-top: 12px; font-weight: bold; color: #444; }
        input { width: 100%; padding: 8px; margin-top: 4px; border: 1px solid #ccc; border-radius: 4px; box-sizing: border-box; }
        button { margin-top: 16px; padding: 10px 24px; background: #333; color: white; border: none; border-radius: 4px; cursor: pointer; }
        button:hover { background: #555; }

        .sucesso { background: #d4edda; color: #155724; padding: 10px; border-radius: 4px; margin-bottom: 16px; }
        .erros { background: #f8d7da; color: #721c24; padding: 10px; border-radius: 4px; margin-bottom: 16px; }

        table { width: 100%; border-collapse: collapse; background: white; margin-top: 10px; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 4px rgba(0,0,0,0.1); }
        th { background: #333; color: white; padding: 10px; text-align: left; }
        td { padding: 10px; border-bottom: 1px solid #eee; }
        tr:last-child td { border-bottom: none; }
        .genero-tag { background: #333; color: white; padding: 2px 8px; border-radius: 12px; font-size: 12px; }
    </style>
</head>
<body>

    <h1>🎬 Locadora de Filmes</h1>

    <!-- Formulário -->
    <h2>Cadastrar Filme</h2>
    <form action="{{ route('locadora.store') }}" method="POST">
        @csrf

        @if(session('success'))
            <div class="sucesso">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="erros">
                @foreach($errors->all() as $error)
                    <div>• {{ $error }}</div>
                @endforeach
            </div>
        @endif

        <label>Gênero</label>
        <input type="text" name="genero_nome" placeholder="Terror, Comédia, Ação..." value="{{ old('genero_nome') }}">

        <label>Título do Filme</label>
        <input type="text" name="filme_titulo" placeholder="Nome do filme" value="{{ old('filme_titulo') }}">

        <label>Ano de Lançamento</label>
        <input type="number" name="filme_ano" placeholder="2024" value="{{ old('filme_ano') }}">

        <label>Diretor</label>
        <input type="text" name="filme_diretor" placeholder="Nome do diretor" value="{{ old('filme_diretor') }}">

        <label>Duração (minutos)</label>
        <input type="number" name="filme_duracao" placeholder="120" value="{{ old('filme_duracao') }}">

        <button type="submit">Cadastrar</button>
    </form>

    <!-- Listagem -->
    <h2>Filmes Cadastrados</h2>
    <table>
        <thead>
            <tr>
                <th>Título</th>
                <th>Gênero</th>
                <th>Diretor</th>
                <th>Ano</th>
                <th>Duração</th>
            </tr>
        </thead>
        <tbody>
            @forelse($generos as $genero)
                @foreach($genero->filmes as $filme)
                    <tr>
                        <td>{{ $filme->titulo }}</td>
                        <td><span class="genero-tag">{{ $genero->nome }}</span></td>
                        <td>{{ $filme->diretor }}</td>
                        <td>{{ $filme->ano_lancamento }}</td>
                        <td>{{ $filme->duracao }} min</td>
                    </tr>
                @endforeach
            @empty
                <tr>
                    <td colspan="5" style="text-align:center; color:#999; padding: 20px;">Nenhum filme cadastrado ainda.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html> 