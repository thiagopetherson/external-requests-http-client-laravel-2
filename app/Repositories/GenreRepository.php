<?php

namespace App\Repositories;

use App\Interfaces\GenreInterface; //Chamando a interface
use App\Services\GenreService;

class GenreRepository implements GenreInterface
{
    private $genreService;

    public function __construct(GenreService $genreService)
    {
        $this->genreService = $genreService;
    }

    public function getGenres() {
        return $this->genreService->getGenres();
    }

}
