<?php

namespace Tests\Feature;

use App\Http\Requests\SeriesFormRequest;
use App\Repositories\SeriesRepository;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SeriesRepositoryTest extends TestCase
{
    use RefreshDatabase;

    public function test_when_a_series_is_created_his_seasons_and_episodes_has_created_too()
    {
        $repository = $this->app->make(SeriesRepository::class);
        $request = new SeriesFormRequest();
        $request->name = "Nome da série";
        $request->seasonsQty = 1;
        $request->episodesPerSeason = 1;

        $repository->add($request);

        $this->assertDatabaseHas("series", ["name" => $request->name]);
        $this->assertDatabaseHas("seasons", ["number" => $request->seasonsQty]);
        $this->assertDatabaseHas("episodes", ["number" => $request->episodesPerSeason]);
    }
}
