<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Movie;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UpFileController extends Controller
{
    public function upFile(Request $request)
    {
        $file = $request->file('file');
        $path = '';
        if ($file->extension() === 'jpg') $path = 'images';
        else if ($file->extension() === 'mp4') {
            $film_name = Movie::where('id', $request->id_movie)->select('original_name')->first();
            $path = 'videos/' . Str::slug($film_name->original_name);
        } else
            return response()->json([
                'status' => 0,
                'message' => 'Vui lòng chọn đúng định dạng!'
            ]);
        $filename = Str::slug($request->name) . '.' . $file->extension();
        if (!$file->move(public_path($path), $filename))
            return response()->json([
                'status' => 0,
                'message' => 'Đã có lỗi khi lưu tệp'
            ]);

        return response()->json(['status' => 1, 'filename' => '/' . $path . '/' . $filename]);
    }
}
