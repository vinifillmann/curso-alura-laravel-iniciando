<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="POST">
        @csrf
        
        <div class="row mb-3">
            <div class="col-8">
                <label for="name" class="form-label">Nome:</label>
                <input autofocus type="text" id="name" name="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="col-2">
                <label for="seasonsQty" class="form-label">Nº Temporadas:</label>
                <input type="number" min="1" id="seasonsQty" name="seasonsQty" class="form-control" value="{{ old('seasonsQty') }}">
            </div>

            <div class="col-2">
                <label for="episodesPerSeason" class="form-label">Episodios/Temporada:</label>
                <input type="number" min="1" id="episodesPerSeason" name="episodesPerSeason" class="form-control" value="{{ old('episodesPerSeason') }}">
            </div>

        </div>

        <input type="submit" class="btn btn-primary" value="Adicionar">
    </form>

</x-layout>