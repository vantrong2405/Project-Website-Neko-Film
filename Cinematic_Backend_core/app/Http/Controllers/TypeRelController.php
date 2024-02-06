<?php

namespace App\Http\Controllers;

use App\Models\TypeRel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TypeRelController extends Controller
{
    public function destroy(Request $request)
    {
        try {
            TypeRel::where('id', $request->id)->delete();
            return response()->json([
                'status' => true,
                'message' => "Xóa thành công",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Lỗi xóa không thành công !",
            ]);
        }
    }

    public function dataChoosed(Request $request)
    {
        $data = TypeRel::join('types', 'types.id', 'type_rels.id_type')
            ->where('type_rels.id_movie', $request->id_movie)
            ->select('types.name', 'type_rels.id')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        try {
            TypeRel::create([
                'id_type'   => $request->id_type,
                'id_movie'  => 0,
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

    public function data(Request $request)
    {
        $data = TypeRel::join('types', 'types.id', 'type_rels.id_type')
            ->where('type_rels.id_movie', $request->id_movie)
            ->get();

        return response()->json(['data' => $data]);
    }
}
