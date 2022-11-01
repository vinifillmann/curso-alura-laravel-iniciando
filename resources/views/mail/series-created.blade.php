@component("mail::message")

# {{ $nomeSerie }} foi criada

A série {{ $nomeSerie }} com {{ $qtdTemporadas }} temporadas, cada uma contendo {{ $episodiosPorTemporada }} episódios.

Acesse aqui:

@component("mail::button", ["url" => route("seasons.index", $idSerie)])
    Acessar
@endcomponent

@endcomponent