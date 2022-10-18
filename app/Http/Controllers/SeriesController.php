<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Http\Request;
use App\Http\Requests\SeriesFormRequest;

class SeriesController extends Controller
{
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
        $series = Series::create($request->all());
        $seasons = [];
        for ($s = 1; $s <= $request->seasonsQty; $s++) {
            $seasons[] = [
                "series_id" => $series->id,
                "number" => $s
            ];
        }
        Season::insert($seasons);
        $episodes = [];
        foreach ($series->seasons as $season) {
            for ($e = 1; $e <= $request->episodesPerSeason; $e++) {
                $episodes[] = [
                    "season_id" => $season->id,
                    "number" => $e
                ];
            }
        }
        Episode::insert($episodes);

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
