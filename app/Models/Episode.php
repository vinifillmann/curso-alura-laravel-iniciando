<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episode extends Model
{
    use HasFactory;

    protected $fillable = ["number"];
    public $timestamps = false;
    protected $casts = [
        "watched" => "bool"
    ];

    public function season()
    {
        return $this->belongsTo(Season::class);
    }

    // protected function watched(): Attribute
    // {
    //     return new Attribute(
    //         get: function ($watched) {
    //             return (bool) $watched;
    //         },
    //         set: function ($watched) {
    //             return (bool) $watched;
    //         }
    //     );
    // }
}
