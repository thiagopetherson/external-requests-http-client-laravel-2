<?php

namespace App\Services;

use Exception;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Collection;

// Object Class
use App\Classes\GenreProvider;

class GenreService
{
    public function __construct(){

    }

    public function getGenres()
    {
        $url = config('external-apis.tmdb-genres.base_url') . 'genre/movie/list?api_key=7c239e80ee7bf4bc9b4fcea4906f0e3f&region=BR&language=pt-BR';
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

            return collect($movies['genres'])->map(function ($movie) {

                return new GenreProvider(
                    genre_id: $movie['id'],
                    name: $movie['name']
                );
            });

        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return Collection::make();
        }
    }
}
