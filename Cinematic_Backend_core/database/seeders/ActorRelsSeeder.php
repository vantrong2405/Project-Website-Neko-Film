<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ActorRelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now
        DB::table('actor_rels')->delete();
        DB::table('actor_rels')->truncate();
        DB::table('actor_rels')->insert([
            [
                'id_actor'  => 0 + 1,
                'id_movie'  => 1,
                'role'      => 'Ren Ruyi',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 1 + 1,
                'id_movie'  => 1,
                'role'      => 'Ning Yuanzhou',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 2 + 1,
                'id_movie'  => 1,
                'role'      => 'Yu Shisan',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 3 + 1,
                'id_movie'  => 1,
                'role'      => 'Yang Ying',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 4 + 1,
                'id_movie'  => 1,
                'role'      => 'Chu Yue',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 5 + 1,
                'id_movie'  => 1,
                'role'      => 'Li Tongguang',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 6 + 1,
                'id_movie'  => 1,
                'role'      => 'Sun Lang',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 7 + 1,
                'id_movie'  => 1,
                'role'      => 'Deng Hui',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 8 + 1,
                'id_movie'  => 1,
                'role'      => 'Yuan Lu',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 9 + 1,
                'id_movie'  => 1,
                'role'      => 'Qian Zhao',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 10 + 1,
                'id_movie'  => 1,
                'role'      => 'Xiao Yan',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 11 + 1,
                'id_movie'  => 1,
                'role'      => 'Jin Meiniang',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 12 + 1,
                'id_movie'  => 1,
                'role'      => 'Jia Ling',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 13 + 1,
                'id_movie'  => 1,
                'role'      => 'Chief Secretary Du',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 14 + 1,
                'id_movie'  => 1,
                'role'      => 'Emperor An',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 15 + 1,
                'id_movie'  => 1,
                'role'      => 'Emperor Wu',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 16 + 1,
                'id_movie'  => 1,
                'role'      => 'Zhang Song',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 17 + 1,
                'id_movie'  => 1,
                'role'      => 'Empress Shao Jie',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'id_actor'  => 18 + 1,
                'id_movie'  => 1,
                'role'      => 'Imperial Concubine Chu',
                'created_at' => $date,
                'updated_at' => $date,
            ],
        ]);
    }
}
