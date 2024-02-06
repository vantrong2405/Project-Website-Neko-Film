<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Http\Controllers\Controller;
use App\Models\Author;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function data()
    {
        $data = Client::get();
        return response()->json([
            'data'   => $data,
        ]);
    }

    public function store(Request $request)
    {
        try {
            $pass_length = strlen($request->password);
            $pass = $request->password;

            if ($pass_length < 5) {
                return response()->json([
                    'message'               => 'Mật khẩu quá yếu',
                    'status'                => false,
                ]);
            }

            Client::create([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'password'              => bcrypt($request->password),
                'address' => "",
                'images' => "",
                'forget_password_token' => "",
                'email_verify_token'    => "",
            ]);
            return response()->json([
                'message'           => 'Đăng ký thành công',
                'status'            => true,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message'               => 'Đăng ký thất bại',
                'status'                => false,
                'err' => $th,

            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            $check_id = $request->id;
            $data = Client::where("id", $check_id)->update([
                'name'                  => $request->name,
                'email'                 => $request->email,
                'password'              => $request->password,
                'forget_password_token' => $request->forget_password_token,
                'email_verify_token'    => $request->email_verify_token,
            ]);
            return response()->json([
                'status' => true,
                'message' => "update thành công !",
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
            Client::where("id", $request->id)->delete();
            return response()->json([
                'status' => true,
                'message' => "Xóa thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'err' => $th,
                'status' => false,
                'message' => 'Lỗi không xóa thành công'
            ]);
        }
    }

    public function login(Request $request)
    {
        $check = Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password]);
        if ($check == true) {
            $user = Auth::guard('client')->user();
            return response()->json([
                'message'    => 'Đăng nhập thành công',
                'status'     => true,
                'token'      => $user->createToken('api-token')->plainTextToken,
            ]);
        } else {
            return response()->json([
                'status'     =>   false,
                'message'    =>   'Đăng nhập thất bại',
            ]);
        }
    }

    public function check()
    {
        $user = Auth::guard('sanctum')->user();

        try {
            if ($user) {
                return response()->json([
                    "user" => $user,
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

    public function getDataUser(Request $request)
    {
        try {
            $user = Auth::guard('sanctum')->user();
            $data = Client::where("id", $user->id)->get();
            return response()->json([
                "status" => true,
                "data" => $user,
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "data" => $user,
                "err" => $th,
                "message" => "lỗi"
            ]);
        }
    }

    public function changePass(Request $request)
    {
        $user = Auth::guard('sanctum')->user();
        //     return response()->json([
        //         "user" => $user->password,
        //         "pass_old" => $request->old_pass
        //  ]);
        $length = strlen($request->new_pass);
        $newPass = $request->new_pass;
        $newPass1 = $request->new_pass_retype;
        if ($request->old_pass != $user->password) {
            return response()->json([
                "status" => false,
                "message" => "Sai mật khẩu",
            ]);
        }
        if ($length < 5) {
            return response()->json([
                "status" => false,
                "message" => "Mật khẩu phải lớn hơn 5 ký tự",
            ]);
        }
        if ($newPass1 != $newPass) {
            return response()->json([
                "status" => false,
                "message" => "Mật khẩu mới và mật khẩu nhập lại khác nhau!",
            ]);
        }

        try {
            Client::where("id", $user->id)
                ->where("password", $request->old_pass)->update([
                    'password'              => bcrypt($request->new_pass),
                ]);
            return response()->json([
                "status" => true,
                "message" => "Đổi mật khẩu thành công",
                "old_pass" => $request->old_pass
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status" => false,
                "message" => "Lỗi khi đổi mật khẩu",
                "err" => $th,
            ]);
        }
    }

    public function updateDataUser(Request $request)
    {
        try {
            $length = strlen($request->name);
            if ($length < 0 || $length > 20) {
                return response()->json([
                    'status' => false,
                    'message' => "update không thành công ! Tên quá dài ",
                    "length" => $length,
                ]);
            }
            $user = Auth::guard('sanctum')->user();
            $data = Client::where("id", $user->id)->update([
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                // 'password' =>  bcrypt(12345),
            ]);
            return response()->json([
                'status' => true,
                'message' => "update thành công !",
                'request' => $request->all(),
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "update không thành công !",
                'err' => $th,
                'request' => $request->all(),
            ]);
        }
    }
}
