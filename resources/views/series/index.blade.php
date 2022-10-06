<x-layout title="Séries">

    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->nome }}

                <div class="d-flex justify-content-evenly">
                    <form class="me-1" action="{{ route('series.edit', $serie->id) }}" method="GET">
                        @csrf
                        <input class="btn btn-info btn-sm" type="submit" value="/">
                    </form>

                    <form action="{{ route('series.destroy', $serie->id) }}" method="POST">
                        @csrf
                        @method("DELETE")
                        <input class="btn btn-danger btn-sm" type="submit" value="X">
                    </form>
                </div>
            </li>
        @endforeach
    </ul>

</x-layout>
