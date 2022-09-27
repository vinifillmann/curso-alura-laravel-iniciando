<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
    public function index(Request $request)
    {
        $series = Serie::query()->orderBy("nome")->get();

        return view("series.index")->with("series", $series);
    }

    public function create(Request $request)
    {
        return view("series.create");
    }

    public function store(Request $request)
    {
        Serie::create($request->all());

        return to_route("series.index");
    }

    public function destroy(Request $request) 
    {
        
    }
}