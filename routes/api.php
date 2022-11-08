<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ImagesController;
use App\Http\Controllers\Api\SeriesController;
use App\Http\Controllers\Api\SeasonsController;
use App\Http\Controllers\Api\EpisodesController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource("/series", SeriesController::class);

    Route::post("/upload/images", [ImagesController::class, "store"]);

    Route::get("/series/{series}/seasons", [SeasonsController::class, "index"]);

    Route::get("/series/{series}/episodes", [EpisodesController::class, "index"]);

    Route::patch("/episodes/{episode}", [EpisodesController::class, "update"]);
});

Route::post("/login", function (Request $request) {
    $credentials = $request->only(["email", "password"]);

    if (Auth::attempt($credentials) === false) {
        return response()->json("Unathorized", 401);
    }

    $user = Auth::user();
    $user->tokens()->delete();
    $token = $user->createToken("token", ["series:delete", "default"]);

    return response()->json($token);
});