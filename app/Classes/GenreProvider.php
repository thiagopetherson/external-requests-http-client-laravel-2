<?php

namespace App\Classes;


class GenreProvider
{
    public $genre_id, $name;

    public function __construct($genre_id, $name)
    {
        $this->genre_id = $genre_id;
        $this->name = $name;
    }
}
