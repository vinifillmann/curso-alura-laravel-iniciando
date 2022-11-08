<?php

namespace App\Models;

use App\Http\Controllers\Api\EpisodesController;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Series extends Model
{
    use HasFactory;

    protected $fillable = ["name", "cover_path"];
    protected $appends = ["links"];

    public function seasons()
    {
        return $this->hasMany(Season::class, "series_id");
    }

    public function episodes()
    {
        return $this->hasManyThrough(Episode::class, Season::class);
    }

    protected static function booted()
    {
        self::addGlobalScope("ordered", function (Builder $queryBuilder) {
            $queryBuilder->orderBy("name");
        });
    }

    public function links(): Attribute
    {
        return new Attribute(
            get: function () {
                return [
                    [
                        "rel" => "self",
                        "url" => "/api/series/{$this->id}"
                    ],
                    [
                        "rel" => "seasons",
                        "url" => "/api/series/{$this->id}/seasons"
                    ],
                    [
                        "rel" => "episodes",
                        "url" => "/api/series/{$this->id}/episodes"
                    ]
                ];
            }
        );
    }

}
