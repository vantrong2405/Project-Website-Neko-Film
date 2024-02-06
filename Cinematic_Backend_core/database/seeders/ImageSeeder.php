<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now
        DB::table('images')->delete();
        DB::table('images')->truncate();
        DB::table('images')->insert([
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/dvt1r6aeYmjIOyrAyPBWP5py80D.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/iCQIVw4Dh8nbXy13xy1VJX5snoh.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/8rxswLB066Y4ajVDkZKbFu9DtF6.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/jpRELzFqMO5TkSGwNbXKM1oQPCd.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/bto9q27UjHBdZj2lZ6ZwPSef1mx.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/qTT48V9aqMA2BqmiNkNwjUM9PEl.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/l3vSjbg7MSp3Vd5OFWtIjpPkiho.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/2Ol0sP5A4W9H9Qlr3pj5pTxoyx2.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/nU1Wt2yTvnHxjvCp2oPvir5YMIi.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/9iZnc0JBMzsZW8VbRqfXA3ijru1.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/lTmJjeExJuH4hglyVmBsKVkBLy2.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/ePUdPVMnJWPV6TVBYRYrTaM6iAB.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/jlEJETevsRIhgWMCQ6dfeX63arK.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/d0fqkN6c1vuKBQcTEhrJcdur5S1.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/5MuK3eCMOR3b5WANNGMeFbqXlJI.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/38C3wzYJlfUSsN2GzyCLJyZcNsy.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/cZr09TLC2naECa3mY8lkzaMUAtf.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/1bZwHdpG7Q5WQmpghfCTWk3DcC.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => 'https://image.tmdb.org/t/p/w300_and_h450_bestv2/5hbLwalzQ3Q5EqGFTbE34TQgsqK.jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'url' => '/images/a-journey-to-love-(season-1).jpg',
                'created_at' => $date,
                'updated_at' => $date,
            ],
        ]);
    }
}
