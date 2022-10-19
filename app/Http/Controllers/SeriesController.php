<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    private SeriesRepository $repository;

    public function __construct(SeriesRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index(Request $request)
    {
        $series = Series::all();
        $mensagemSucesso = session("mensagem.sucesso");

        return view("series.index")->with("series", $series)->with("mensagemSucesso", $mensagemSucesso);
    }

    public function create()
    {
        return view("series.create");
    }

    public function store(SeriesFormRequest $request)
    {
        $series = $this->repository->add($request);

        return to_route("series.index")->with("mensagem.sucesso", "A Série '{$series->name}' adicionada com sucesso!!!");
    }

    public function destroy(Series $series)
    {
        $series->delete();

        return to_route("series.index")->with("mensagem.sucesso", "A Série '{$series->name}' foi deletada com sucesso!!!");
    }

    public function edit(Series $series)
    {
        // dd($series->seasons);
        return view("series.edit")->with("series", $series);
    }

    public function update(Series $series, SeriesFormRequest $request)
    {
        $nomeAntigo = $series->name;

        $series->fill($request->all());
        $series->save();

        return to_route("series.index")->with("mensagem.sucesso", "A Série '{$nomeAntigo}' editada para '{$series->name}' com sucesso!!!");
    }
}
