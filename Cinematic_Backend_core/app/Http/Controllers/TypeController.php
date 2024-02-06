<?php

namespace App\Http\Controllers;

use App\Models\Type;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Exception;
use FFI\CType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TypeController extends Controller
{
    public function search(Request $request)
    {
        $data = Type::where('name', 'like', '%' . $request->key . '%')
            ->get();

        return response()->json(['data' => $data]);
    }

    public function data()
    {
        $data = Type::select()->get();
        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        try {
            Type::create([
                'name' => $request->name,
                'description' => $request->description,
            ]);


            return response()->json([
                'status' => true,
                'message' => "Tạo mới thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Tạo mới không thành công!",
                'err' => $th,
                'id_1' => $request->name,
                'id_2' => $request->description,
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $check_id = $request->id;
            $data = Type::where("id", $check_id)->update([
                'name' => $request->name,
                'description' => $request->description,
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
            $data = Type::where("id", $request->id)->first();
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
