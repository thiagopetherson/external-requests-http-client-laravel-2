<?php

namespace App\Interfaces;


Interface MovieInterface
{
    public function getMovies(string $a);
    public function getMoviesByGenre(string $a);
}
