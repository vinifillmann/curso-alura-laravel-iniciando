<x-layout title="Editar Série">
    <x-series.form action="{{ route('series.update', $series->id) }}" nome="{{ $series->nome }}" :update="true" />
</x-layout>