<x-layout title="Nova Série">

    <form action="{{ route('series.store') }}" method="POST" enctype="multipart/form-data">
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

        <div class="row mb-3">
            <div class="col-12">
                <label for="cover" class="form-label">Capa</label>
                <input type="file" id="cover" name="cover" class="form-control" accept="image/png, image/jpeg, image/jpg">
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Adicionar">
    </form>

</x-layout>