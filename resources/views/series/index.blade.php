<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">

    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a @auth href="{{ route('seasons.index', $serie->id) }}" @endauth >{{ $serie->name }}</a>

                @auth
                    <div class="d-flex">
                        <a href="{{ route('series.edit', $serie->id) }}" class="btn btn-primary btn-sm me-1">E</a>

                        <form action="{{ route('series.destroy', $serie->id) }}" method="POST">
                            @csrf
                            @method("DELETE")
                            <input class="btn btn-danger btn-sm" type="submit" value="X">
                        </form>
                    </div>
                @endauth
            </li>
        @endforeach
    </ul>

</x-layout>
