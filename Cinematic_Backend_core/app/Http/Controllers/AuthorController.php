<?php //moi

namespace App\Http\Controllers;

use App\Models\Author;
use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Movie;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthorController extends Controller
{

    public function data()
    {
        $data = Author::join('images', 'images.id', 'authors.id_images')
            ->select(DB::raw('CONCAT("' . env('APP_URL') . '", images.url) as url'), 'authors.*')
            ->get();

        foreach ($data as $author) {
            $author['movies'] = '';
            $list = Movie::where('id_author', $author->id)->get();
            if ($list !== null) {
                foreach ($list as $movie) $author['movies'] .= $movie->original_name . ', ';
            }
            $author['movies']  = rtrim($author['movies'], ', ');
        }
        return response()->json([
            'data'   => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function store(Request $request)
    {
        // return response()->json([
        //     'status'            =>   $request->all(),
        // ]);
        try {
            $img = Image::create([
                'url'            => $request->filename,
            ]);
            Author::create([
                'name'           => $request->name,
                'id_images'       => $img->id,
            ]);
            return response()->json([
                'status'            =>   true,
                'message'           =>   'Tạo mới thành công!',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status'    =>   false,
                'message'   =>   'Lỗi tạo mới không thành công!',
                'err'       => $th
            ]);
        }
    }

    public function update(Request $request)
    {
        try {
            return response()->json([
                'data' => $request->all(),
            ]);
            $check_id = $request->id;
            Author::where("id", $check_id)->update([
                'name'      => $request->name,
            ]);
            if ($request->filename)
                Image::where("id", $check_id)->update([
                    'url'      => $request->filename,
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
            Author::where('id', $request->id)->delete();
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
