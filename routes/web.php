<?php

use Illuminate\Support\Facades\Route;
use App\Mail\SeriesCreated;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect("/series");
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get("/email", function () {
    return new SeriesCreated(
        "Bob Esponja",
        6,
        20,
        30
    );
});

require __DIR__.'/auth.php';
