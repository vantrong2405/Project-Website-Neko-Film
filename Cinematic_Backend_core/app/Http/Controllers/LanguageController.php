<?php

namespace App\Http\Controllers;

use App\Models\Language;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function data()
    {
        $data = Language::select()->get();
        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        try {
            Language::create([
                'name' => $request->name,
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
            $data = Language::where("id", $check_id)->update([
                'name' => $request->name,
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
            $data = Language::where("id", $request->id)->first();
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
