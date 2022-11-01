<x-layout title="Temporadas de '{!! $series->name !!}'">

    {{-- <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a> --}}

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset
    
    <div class="d-flex justify-content-center my-3">
        @php
            if($series->cover_path) {
                $path = $series->cover_path;
            } else {
                $path = "series_cover/padrao.jpg";
            }
        @endphp
        <img src="{{ asset('storage/' . $path) }}" style="height: 400px" alt="Capa da série" class="img-fluid">
    </div>

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->id) }}">
                    Temporada {{ $season->number }}
                </a>

                <div class="badge bg-secondary">
                    {{ $season->numberOfWatchedEpisodes() }} / {{ $season->episodes->count() }}
                </div>
            </li>
        @endforeach
    </ul>

</x-layout>
