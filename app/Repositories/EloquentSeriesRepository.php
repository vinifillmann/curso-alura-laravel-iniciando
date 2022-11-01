<?php

namespace App\Repositories;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Season;
use App\Models\Series;
use App\Models\Episode;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function add(SeriesFormRequest $request): Series
    {
        return DB::transaction(function () use ($request) {
            $series = Series::create([
                "name" => $request->name,
                "cover_path" => $request->coverPath,
            ]);
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

            return $series;
        });
    }
}