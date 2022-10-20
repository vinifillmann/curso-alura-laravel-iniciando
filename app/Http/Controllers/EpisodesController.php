<?php

namespace App\Http\Controllers;

use App\Models\Season;
use Illuminate\Http\Request;

class EpisodesController extends Controller
{
    public function index(Season $season)
    {
        return view("episodes.index")->with("episodes", $season->episodes);
    }

    public function update(Request $request)
    {
        dd($request->all());
    }

}