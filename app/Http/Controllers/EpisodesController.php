<?php

namespace App\Http\Controllers;

use App\Models\Season;
use App\Models\Episode;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view("episodes.index")->with("episodes", $season->episodes)->with("mensagemSucesso", session("mensagem.sucesso"));
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->episodes;
        $season->episodes->each(function (Episode $episode) use ($watchedEpisodes) {
            $episode->watched = $watchedEpisodes !== NULL ? in_array($episode->id, $watchedEpisodes) : false;
        });
        $season->push();

        return to_route("episodes.index", $season->id)->with("mensagem.sucesso", "Episódios marcados como assistidos com sucesso!!!");
    }

}