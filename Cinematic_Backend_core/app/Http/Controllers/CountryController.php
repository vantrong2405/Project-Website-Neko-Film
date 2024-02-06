<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Http\Controllers\Controller;
use App\Models\Client;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CountryController extends Controller
{

    public function store(Request $request)
    {
        try {
            Country::create([
                'name'                  => $request->name,
            ]);
            return response()->json([
                'message'           => 'Tạo mới thành công',
                'status'            => true,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message'           => 'Lỗi tạo mới không thành công',
                'status'             => false,
                'err'             => $th,
            ]);
        }
    }

    public function data(Request $request)
    {
        $data = Country::get();
        return response()->json([
            'data'   => $data,
        ]);
    }

    public function update(Request $request)
    {
        try {
            $check_id = $request->id;
            Country::where("id", $check_id)->update([
                'name'                  => $request->name,
            ]);
            return response()->json([
                'status' => true,
                'message' => "Cập nhật thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Lỗi cập nhật không thành công!",
                'err' => $th
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        return response()->json([
            'status'            =>   $request->all(),
        ]);
        try {
            Country::where('id', $request->id)->delete();
            return response()->json([
                'status'            =>   true,
                'message'           =>   'Xóa thành công!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Lỗi xóa không thành công!",
                'err' => $th
            ]);
        }
    }
}
