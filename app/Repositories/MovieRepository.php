<?php

namespace App\Repositories;

use App\Interfaces\MovieInterface; //Chamando a interface
use App\Services\MovieService;

class MovieRepository implements MovieInterface
{
    protected $movieService;

    public function __construct(MovieService $movieService) {
        $this->movieService = $movieService;
    }

    public function getMovies($type) {
        return $this->movieService->getMovies($type);
    }

    public function getMoviesByGenre ($genre) {
        return $this->movieService->getMoviesByGenre($genre);
    }

}
