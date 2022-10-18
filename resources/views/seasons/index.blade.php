<x-layout title="Temporadas de '{!! $series->name !!}'">

    {{-- <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a> --}}

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <ul class="list-group">
        @foreach ($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Temporada {{ $season->number }}

                <div class="badge bg-secondary">
                    {{ $season->episodes->count() }}
                </div>
            </li>
        @endforeach
    </ul>

</x-layout>
