<?php

namespace App\Http\Controllers;

use App\Models\Actor;
use App\Http\Controllers\Controller;
use App\Models\ActorRel;
use App\Models\Image;
use App\Models\Movie;
use App\Models\TypeRel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ActorController extends Controller
{
    public function search(Request $request)
    {
        $data = Actor::where('name', 'like', '%' . $request->key . '%')->get();

        return response()->json(['data' => $data]);
    }

    public function data()
    {
        $data = Actor::join('images', 'actors.id_image', 'images.id')
            ->select("actors.id", DB::raw('CONCAT("' . env('APP_URL') . '", images.url) as url'), "actors.name")
            ->get();

        foreach ($data as $actor) {
            $list = ActorRel::join('movies', 'movies.id', 'actor_rels.id_movie')
                ->where('actor_rels.id_actor', $actor->id)
                ->select('movies.original_name as name')->get();
            if (!$list) break;
            $actor['list_phim'] = '';
            foreach ($list as $value) {
                $actor['list_phim'] .= $value->name . ',';
            }
            $actor['list_phim'] = rtrim($actor['list_phim'], ',');
        }

        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        try {
            $image = Image::create([
                'url' => $request->filename,
            ]);

            Actor::create([
                'name' => $request->name,
                'id_image' => $image->id,
            ]);

            return response()->json([
                'status' => true,
                'message' => "Tạo mới thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Tạo mới không thành công!",
                "err" => $th,
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            Actor::where('id', $request->id)->update([
                'name' => $request->name,
            ]);


            Image::where('id', $request->id)->update([
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
                'err' => $th
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $data = Actor::where("id", $request->id)->first();
            $data->delete();
            return response()->json([
                'status' => true,
                'message' => "Xóa thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Xóa không thành công!",
                'id' =>  $request->id,
                'err' => $th
            ]);
        }
    }
}
