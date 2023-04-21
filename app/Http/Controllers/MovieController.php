<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\MovieRepository;

class MovieController extends Controller
{
    public function __construct() {

    }

    public function getMovies (MovieRepository $movieRepository) {
       $movies = $movieRepository->getMovies('popular');
       return response()->json($movies, 200);
    }

    public function getMoviesByGenre (MovieRepository $movieRepository) {
        // Genres (most popular, best evaluated, at the movies, horror, thriller...)
        $movies = $movieRepository->getMoviesByGenre('horror');
        return response()->json($movies, 200);
    }
}
