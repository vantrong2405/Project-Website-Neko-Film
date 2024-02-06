<?php

namespace App\Http\Controllers;

use App\Models\ActorRel;
use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\TypeRel;
use Illuminate\Http\Request;

class ActorRelController extends Controller
{
    public function dataChoosed(Request $request)
    {
        $data = ActorRel::join('actors', 'actors.id', 'actor_rels.id_actor')
            ->where('actor_rels.id_movie', $request->id_movie)
            ->select('actors.name', 'actor_rels.role', 'actor_rels.id')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function data()
    {
        $data = ActorRel::join("movies", "id_movie", "movies.id")
            ->join("actors", "id_actor", "actors.id") //DO TRUY VẤN SAI
            ->select(
                "original_name",
                "name",
                "actor_rels.*"
            )->get();
        return response()->json($data);
    }

    public function store(Request $request)
    {
        try {
            ActorRel::create([
                'id_actor'  => $request->id_actor,
                'id_movie'  => 0,
                'role'      => $request->role
            ]);
            return response()->json([
                'status' => true,
                'message' => "Tạo mới thành công",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Lỗi tạo mới không thành công !",
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $check_id = $request->id;
            $data = ActorRel::where("id", $check_id)->update([
                'id_actor' => $request->id_actor,
                'id_movie' => $request->id_movie,
                'role' => $request->role,
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
            ActorRel::where('id', $request->id)->delete();
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

    public function checkIdMovies(Request $request)
    {
        $check_id_movies = $request->id_movies;
        $data = ActorRel::where('id_movies', $check_id_movies)->get();
        return response()->json($data);
    }
}
