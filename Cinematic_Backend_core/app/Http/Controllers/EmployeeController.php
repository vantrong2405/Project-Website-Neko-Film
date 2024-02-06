<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function login(Request $request)
    {
        $check = Auth::guard('employee')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($check == true) {
            $user = Auth::guard('employee')->user();
            return response()->json([
                'message'    => 'Đăng nhập thành công',
                'status'     => true,
                'token'      => $user->createToken('api-token-employee')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'     =>   false,
                'message'    =>   'Đăng nhập thất bại',
                'email' => $request->email,
                'pass' => $request->password,
            ]);
        }
    }
    public function check()
    {
        $user = Auth::guard('sanctum')->user();
        try {
            if ($user) {
                return response()->json([
                    'name' => $user->name,
                    'email' => $user->email,
                    'status' => true
                ]);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'err' => $th,
                'status' => false
            ]);
        }
    }

    public function store(Request $request)
    {
        try {
            Employee::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'password'          => bcrypt($request->password),
            ]);
            return response()->json([
                'status'  => true,
                'message' => "Tạo mới nhân viên thành công",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'  => false,
                'message' => "Tạo mới nhân viên thất bại",
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function data()
    {
        $data = Employee::get();
        return response()->json([
            'data'   => $data,
        ]);
    }

    public function update(Request $request)
    {
        try {
            $check_id = $request->id;
            $data = Employee::where("id", $check_id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'password'              => $request->password,
            ]);
            return response()->json([
                'status' => true,
                'message' => "update thành công !",
                //
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "update không thành công !",
                'err' => $th
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            Employee::where('id', $request->id)->delete();
            return response()->json([
                'status'            =>   true,
                'message'           =>   'Xóa thành công!',
            ]);
        } catch (Exception $e) {
            Log::info("Lỗi", $e);
            return response()->json([
                'status'            =>   false,
                'message'           =>   'Có lỗi',
            ]);
        }
    }
}
