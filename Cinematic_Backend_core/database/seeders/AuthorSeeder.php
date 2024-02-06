<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AuthorSeeder extends Seeder
{
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now // get datetime now  // get datetime now
        DB::table('authors')->delete();
        DB::table('authors')->truncate();
        DB::table('authors')->insert([
            [
                'name' => 'Sam Hargrave',
                'id_images' => 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Na Young-seok',
                'id_images' => 2,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Jang Eun-jung',
                'id_images' => 3,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Trâu Hi',
                'id_images' => 4,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Chu Tĩnh Thao',
                'id_images' => 5,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            ['name' => 'Scarlett Johansson', 'id_images' => 6, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Chris Hemsworth', 'id_images' => 7, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Robert Downey Jr.', 'id_images' => 8, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Tom Hanks', 'id_images' => 9, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Chris Evans', 'id_images' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Dwayne Johnson', 'id_images' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Gal Gadot', 'id_images' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Ryan Reynolds', 'id_images' => 1, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Jennifer Lawrence', 'id_images' => 1, 'created_at' => $date, 'updated_at' => $date],
        ]);
    }
}
