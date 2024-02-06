<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now // get datetime now  // get datetime now  // get datetime now  // get datetime now  // get datetime now  // get datetime now  // get datetime now
        DB::table('actors')->delete();
        DB::table('actors')->truncate();
        DB::table('actors')->insert([
            [
                'name'      => 'Liu Shishi',
                'id_image'  => 0 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Liu Yuning',
                'id_image'  => 1 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Fang Yilun',
                'id_image'  => 2 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'He Landou',
                'id_image'  => 3 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Chen Haoyu',
                'id_image'  => 4 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Chang Huasen',
                'id_image'  => 5 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Li Huan',
                'id_image'  => 6 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Zhang Fan',
                'id_image'  => 7 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Chen Youwei',
                'id_image'  => 8 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Wang Yizhe',
                'id_image'  => 9 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Chen Duling',
                'id_image'  => 10 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Maggie Huang',
                'id_image'  => 11 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Zhang Zhixi',
                'id_image'  => 12 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Lv Xing',
                'id_image'  => 13 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Yin Zhu-Sheng',
                'id_image'  => 14 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Zhang Tianyang',
                'id_image'  => 15 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Zhang Lei',
                'id_image'  => 16 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Wang Yan',
                'id_image'  => 17 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name'      => 'Chen Xiaoyun',
                'id_image'  => 18 + 1,
                'created_at' => $date,
                'updated_at' => $date,
            ],
        ]);
    }
}
