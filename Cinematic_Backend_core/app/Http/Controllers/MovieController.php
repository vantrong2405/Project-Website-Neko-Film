<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Controllers\Controller;
use App\Models\Actor;
use App\Models\ActorRel;
use App\Models\Author;
use App\Models\Country;
use App\Models\Episode;
use App\Models\Image;
use App\Models\Language;
use App\Models\TypeRel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\File;

class MovieController extends Controller
{

    public function dataOneMovie(Request $request)
    {
        $data = Movie::where('id', $request->id_movie)->first();

        return response()->json(['data' => $data]);
    }

    public function data()
    {
        $data = Movie::join('languages', 'movies.id_language_original', 'languages.id')
            ->join('countries', 'countries.id', 'movies.id_contries')
            ->join('employees', 'employees.id', 'movies.id_user_upload')
            ->join('images', 'images.id', 'movies.id_image')
            ->join('authors', 'authors.id', 'movies.id_author')
            ->select(
                'movies.*',
                DB::raw('CONCAT("' . env('APP_URL') . '", images.url) as url'),
                'authors.name as author_name',
                'countries.name as country_name',
                'employees.name as user_name',
                'languages.name as language_name',
                DB::raw("DATE_FORMAT(movies.date, '%d/%m/%Y') as date")
            )->get();

        foreach ($data as $movie) {
            $movie['types'] = '';
            $movie['actors'] = '';
            $movie['roles'] = '';
            $list_type = TypeRel::join('types', 'type_rels.id_type', 'types.id')
                ->where('type_rels.id_movie', $movie->id)->select('types.name')->get();
            if ($list_type !== null) {
                foreach ($list_type as $type) $movie['types'] .= $type->name . ',';
            }
            $list_actor = ActorRel::join('actors', 'actors.id', 'actor_rels.id_actor')
                ->where('actor_rels.id_movie', $movie->id)
                ->select('actors.name', 'actor_rels.role')->get();
            if ($list_actor !== null) {
                foreach ($list_actor as $actor) {
                    $movie['actors'] .= $actor->name . ',';
                    $movie['roles'] .= $actor->role . ',';
                }
            }
            $movie['types'] = rtrim($movie['types'], ',');
            $movie['actors'] = rtrim($movie['actors'], ',');
            $movie['roles'] = rtrim($movie['roles'], ',');
        }
        return response()->json(['data' => $data]);
    }

    public function dataDetail(Request $request)
    {
        $data = Movie::join('languages', 'movies.id_language_original', 'languages.id')
            ->join('countries', 'countries.id', 'movies.id_contries')
            ->join('employees', 'employees.id', 'movies.id_user_upload')
            ->join('images', 'images.id', 'movies.id_image')
            ->join('authors', 'authors.id', 'movies.id_author')
            ->where('movies.id', $request->id_movie)
            ->select(
                'movies.*',
                DB::raw('CONCAT("' . env('APP_URL') . '", images.url) as url'),
                'authors.name as author_name',
                'countries.name as country_name',
                'employees.name as user_name',
                'languages.name as language_name',
                DB::raw("DATE_FORMAT(movies.date, '%d/%m/%Y') as date")
            )->get();

        foreach ($data as $movie) {
            $movie['types'] = '';
            $movie['actors'] = '';
            $movie['roles'] = '';
            $list_type = TypeRel::join('types', 'type_rels.id_type', 'types.id')
                ->where('type_rels.id_movie', $movie->id)->select('types.name')->get();
            if ($list_type !== null) {
                foreach ($list_type as $type) $movie['types'] .= $type->name . ',';
            }
            $list_actor = ActorRel::join('actors', 'actors.id', 'actor_rels.id_actor')
                ->where('actor_rels.id_movie', $movie->id)
                ->select('actors.name', 'actor_rels.role')->get();
            if ($list_actor !== null) {
                foreach ($list_actor as $actor) {
                    $movie['actors'] .= $actor->name . ',';
                    $movie['roles'] .= $actor->role . ',';
                }
            }
            $movie['types'] = rtrim($movie['types'], ',');
            $movie['actors'] = rtrim($movie['actors'], ',');
            $movie['roles'] = rtrim($movie['roles'], ',');
        }
        return response()->json(['data' => $data]);
    }

    public function store(Request $request)
    {
        try {
            $image = Image::create([
                'url' => $request->filename
            ]);

            $movie = Movie::create([
                'original_name' => $request->original_name,
                'vietnamese_name' => $this->translateToVietnamese($request->original_name),
                'id_image' => $image->id,
                'description' => $request->description,
                'rating' => 0,
                'id_contries' => $request->id_contries,
                'id_author' => $request->id_author,
                'id_user_upload' => $request->id_user_upload,
                'id_language_original' => $request->id_language_original,
                'date' => $request->date,
                'views' => 0,
            ]);

            $list_actor_rels = ActorRel::where('id_movie', 0)->get();
            $list_type_rels = TypeRel::where('id_movie', 0)->get();

            foreach ($list_type_rels as $type) {
                $type->update(['id_movie' => $movie->id]);
            }

            foreach ($list_actor_rels as $actor) {
                $actor->update(['id_movie' => $movie->id]);
            }

            return response()->json([
                'status'    => true,
                'message'   => "Tạo mới thành công!",
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Tạo mới không thành công!",
                'err' => $th
            ]);
        }
    }

    public function update(Request $request)
    {
        return response()->json(['data' => $request->all()]);
        try {
            $movie = Movie::where("id", $request->id)->update([
                'original_name' => $request->original_name,
                'vietnamese_name' => $request->vietnamese_name,
                'description' => $request->description,
                'id_contries' => $request->id_contries,
                'id_author' => $request->id_author,
                'id_language_original' => $request->id_language_original,
                'date' => $request->date,
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
            $image = Image::where('id', $request->id_image)->first();
            $filePath = public_path(ltrim($image->url, '/'));
            if (File::exists($filePath)) {
                if (File::delete($filePath)) {
                    $image->delete();
                    return response()->json([
                        'status' => true,
                        'message' => "Xóa thành công!",
                    ]);
                } else
                    return response()->json([
                        'status' => false,
                        'message' => "Có lỗi trong quá trình xóa file!",
                    ]);
            } else
                return response()->json([
                    'status' => false,
                    'message' => "Không tìm thấy file!",
                ]);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => "Xóa không thành công!",
                'err' => $th
            ]);
        }
    }

    public function translateToVietnamese($text)
    {
        $translator = new GoogleTranslate('vi'); // Đặt ngôn ngữ đích là tiếng Việt

        // Dịch văn bản từ tiếng Anh sang tiếng Việt
        return $translator->translate($text);
    }
}
