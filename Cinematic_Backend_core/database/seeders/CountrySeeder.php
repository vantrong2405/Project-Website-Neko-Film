<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CountrySeeder extends Seeder
{
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now
        DB::table('countries')->delete();
        DB::table('countries')->truncate();
        DB::table('countries')->insert([
            [
                'name' => 'Âu Mỹ',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Nhật Bản',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Anh Quốc',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Hàn Quốc',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Trung Quốc',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            ['name' => 'Nga', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Pháp', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Đức', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Úc', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Brazil', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Ấn Độ', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Ý', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Thụy Điển', 'created_at' => $date, 'updated_at' => $date],
        ]);
    }
}
