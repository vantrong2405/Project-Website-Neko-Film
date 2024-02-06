<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EpisodeController extends Controller
{
    public function getDataEpisode(Request $request)
    {
        $data = Episode::join('movies', 'id_movies', 'movies.id')
            ->where('episodes.id_movies', $request->id_movies)
            ->where('episodes.id', $request->id_num)
            ->select(
                DB::raw('CONCAT("' . env('APP_URL') . '", episodes.url) as url_movie'),
                'original_name',
                'episodes.*',
            )->get();
        return response()->json(['data' => $data]);
    }

    public function data(Request $request)
    {
        $data = Episode::join('movies', 'id_movies', 'movies.id')
            ->where('episodes.id_movies', $request->id_movie)
            ->select(
                'original_name',
                'episodes.*',
            )->get();
        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        try {
            Episode::create([
                'num_eps' => $request->num_eps,
                'id_movies' => $request->id_movie,
                'url' => $request->filename,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Tạo mới thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Tạo mới không thành công!",
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            Episode::where("id", $request->id)->update([
                'num_eps' => $request->num_eps,
                'id_movies' => $request->id_movies,
                'url' => $request->url,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Cập nhật thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Cập nhật không thành công!",
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $data = Episode::where("id", $request->id)->first();
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => "Xóa thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Xóa không thành công!",
            ]);
        }
    }
}
