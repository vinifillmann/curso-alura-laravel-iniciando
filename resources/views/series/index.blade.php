<x-layout title="Séries" :mensagem-sucesso="$mensagemSucesso">

    @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
    @endauth

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <div class="d-flex align-items-center">
                    @php
                        if($serie->cover_path) {
                            $path = $serie->cover_path;
                        } else {
                            $path = "series_cover/padrao.jpg";
                        }
                    @endphp
                    <img src="{{ asset('storage/' . $path) }}" style="width: 100px; height: 70px;" class="img-thumbnail me-3">
                    <a @auth href="{{ route('seasons.index', $serie->id) }}" @endauth >{{ $serie->name }}</a>
                </div>

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
