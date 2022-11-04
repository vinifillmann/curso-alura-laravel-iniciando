<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImagesController extends Controller
{

    public function store(Request $request)
    {
        if (!$request->file_type) {
            $request->file_type = "png";
        }
        $path = $request->path . "/" . uniqid() . "." . $request->file_type;
        while(Storage::disk("public")->exists($path)) {
            $path = $request->path . "/" . uniqid() . "." . $request->file_type;
        }
        Storage::disk("public")->put($path, $request->getContent());
        return response()->json(["path" => $path]);
    }
}