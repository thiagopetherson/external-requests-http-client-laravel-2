<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

// Object Class
use App\Classes\MovieProvider;

class MovieService
{
    public function __construct(){

    }

    public function getMovies($type)
    {
        $url = config('external-apis.tmdb-movies.base_url') . 'movie/'.$type.'?api_key=7c239e80ee7bf4bc9b4fcea4906f0e3f&region=BR&language=pt-BR';
        return $this->doRequest($url);
    }

    public function getMoviesByGenre($genre)
    {
        $url = config('external-apis.tmdb-movies.base_url') . 'discover/movie?api_key=7c239e80ee7bf4bc9b4fcea4906f0e3f&with_genres='.$genre.'&sort_by=vote_average.desc&vote_count.gte=10&language=pt-BR';
        return $this->doRequest($url);
    }

    public function doRequest($url)
    {
        try
        {
            $response = Http::get($url);

            if (!$response->successful()) {
                return Collection::make();
            }

            $movies = $response->json();

            return collect($movies['results'])->map(function ($movie) {

                return new MovieProvider(
                    movie_id: $movie['id'],
                    title: $movie['title'],
                    original_title: $movie['original_title'],
                    original_language: $movie['original_language'],
                    overview: $movie['overview'],
                    release_date: $movie['release_date'],
                    vote_average: $movie['vote_average'],
                    vote_count: $movie['vote_count']
                );
            });

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return Collection::make();
        }
    }
}
