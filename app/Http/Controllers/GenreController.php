<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\GenreRepository;

class GenreController extends Controller
{
    public function __construct() {

    }

    public function getGenres (GenreRepository $genreRepository) {
        $genres = $genreRepository->getGenres();
        return response()->json($genres, 200);
    }
}
