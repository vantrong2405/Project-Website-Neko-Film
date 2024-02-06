<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LanguageSeeder extends Seeder
{
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now
        DB::table('languages')->delete();
        DB::table('languages')->truncate();
        DB::table('languages')->insert([
            [
                'name' => 'English',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Korean',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Japanese',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Vietnamese',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'French',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Chinese',
                'created_at' => $date,
                'updated_at' => $date,
            ],
        ]);
    }
}
