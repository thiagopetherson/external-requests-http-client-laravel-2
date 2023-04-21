<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Controllers
use App\Http\Controllers\MovieController;
use App\Http\Controllers\GenreController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Movies
Route::get('movies-get', [MovieController::class, 'getMovies']);
Route::get('movies-by-genre', [MovieController::class, 'getMoviesByGenre']);

// Genres
Route::get('genres', [GenreController::class, 'getGenres']);


