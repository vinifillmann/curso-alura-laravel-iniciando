<?php

namespace App\Http\Controllers\Api;

use App\Events\SeriesCreated;
use App\Events\SeriesDeleted;
use App\Models\Series;
use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesRequest;
use App\Repositories\SeriesRepository;

class SeriesController extends Controller
{
    
    public function __construct(
        private SeriesRepository $seriesRepository
    )
    {}
    
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesRequest $request)
    {
        $series = $this->seriesRepository->add($request);

        $e = new SeriesCreated(
            $series->name,
            $series->id,
            $request->seasonsQty,
            $request->episodesPerSeason
        );
        $e->dispatch();

        return response()->json($series, 201);
    }

    public function show(int $series)
    {
        $series = Series::whereId($series)->with("seasons.episodes")->first();
        return response()->json($series);
    }

    public function update(Series $series, SeriesRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return response()->json($series);
    }

    public function destroy(Series $series)
    {
        SeriesDeleted::dispatch($series);

        return response()->noContent();
    }

}