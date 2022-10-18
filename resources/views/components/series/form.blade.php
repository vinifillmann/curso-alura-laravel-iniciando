<form action="{{ $action }}" method="POST">
    @csrf
    @if ($update)
        @method("PUT")
    @endif
    <div class="mb-3">
        <label for="nome" class="form-label">Nome:</label>
        <input type="text" id="nome" name="name" class="form-control" @isset($nome) value="{{ $nome }}" @endisset>
    </div>
    <input type="submit" class="btn btn-primary" @if(!isset($nome)) value="Adicionar" @else value="Editar" @endif>
</form>