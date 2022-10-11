<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy("nome")->get();
        $mensagemSucesso = session("mensagem.sucesso");

        return view("series.index")->with("series", $series)->with("mensagemSucesso", $mensagemSucesso);
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create($request->all());

        return to_route("series.index")->with("mensagem.sucesso", "A Série '{$serie->nome}' adicionada com sucesso!!!");
    }

    public function destroy(Serie $series)
    {
        $series->delete();

        return to_route("series.index")->with("mensagem.sucesso", "A Série '{$series->nome}' foi deletada com sucesso!!!");
    }

    public function edit(Serie $series)
    {

        return view("series.edit")->with("series", $series);
    }

    public function update(Serie $series, SeriesFormRequest $request)
    {
        $nomeAntigo = $series->nome;

        $series->fill($request->all());
        $series->save();

        return to_route("series.index")->with("mensagem.sucesso", "A Série '{$nomeAntigo}' editada para '{$series->nome}' com sucesso!!!");
    }
}
