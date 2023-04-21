<?php

namespace App\Classes;


class MovieProvider
{
    public $movie_id,$title,$original_title,$original_language,$overview,$release_date,$vote_average,$vote_count;

    public function __construct($movie_id,$title,$original_title,$original_language,$overview,$release_date,$vote_average,$vote_count)
    {
        $this->movie_id = $movie_id;
        $this->title = $title;
        $this->original_title = $original_title;
        $this->original_language = $original_language;
        $this->overview = $overview;
        $this->release_date = $release_date;
        $this->vote_average = $vote_average;
        $this->vote_count = $vote_count;
    }
}
