<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\Episode;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    public function index()
    {
        $data = Movie::join('authors', 'movies.id_author', 'authors.id')
            ->join('countries', 'countries.id', 'movies.id_contries')
            ->join('images', 'images.id', 'movies.id_image')
            ->join('languages', 'languages.id', 'movies.id_language_original')
            ->select('movies.*', 'authors.name as Dao_Dien', 'countries.name as Quoc_Gia', 'images.url', 'languages.name as Language')
            ->get();
        $actor = Actor::join('actor_rels', 'actor_rels.id_actor', 'actors.id')
            ->join('images', 'images.id', 'actors.id_image')
            ->where('actor_rels.id_movie', 1)
            ->select('actors.name', 'images.url', 'actor_rels.role')
            ->get();
        $episode = Episode::where('id_movies', 1)
            ->select('episodes.num_eps', 'episodes.url', DB::raw('COUNT(id) as So_tap'))
            ->groupBy('episodes.num_eps', 'episodes.url')
            ->get();
        return response()->json([
            'Movie' => $data,
            'List Actor' => $actor,
            'Episode' => $episode
        ]);
    }
}
