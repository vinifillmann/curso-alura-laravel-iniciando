<x-layout title="Nova Série">
    <form action="{{ route("series.store") }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" id="nome" name="nome" class="form-control">
        </div>
        <input type="submit" class="btn btn-primary" value="Adicionar">
    </form>
</x-layout>