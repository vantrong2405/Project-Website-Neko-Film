<?php

namespace Database\Seeders;

use App\Models\Episode;
use App\Models\Movie;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now
        DB::table('movies')->delete();
        DB::table('movies')->truncate();
        DB::table('episodes')->delete();
        DB::table('episodes')->truncate();
        DB::table('movies')->insert([
            [
                'original_name' => "A Journey to Love (season 1)",
                'vietnamese_name'   => 'Nhất Niệm Quan Sơn (phần 1)',
                'id_image'  => 20,
                'description'   => 'Nhất Niệm Quan Sơn - A Journey to Love (2023) kể về cuộc phân tranh từ lâu của giữa hai quốc gia An Quốc và Ngô Quốc. Nhậm Như Ý (Lưu Thi Thi thủ vai) - cô là tiền tả sứ Chu Y Vệ của An Quốc. Vì một vài lý do, Như Ý lưu lạc đến Ngô Quốc và thành lập đội sứ thần Nghinh Đế. Sau đó, Như Ý cùng Ninh Viễn Châu (Lưu Vũ Ninh thủ vai) và nhóm bạn bắt đầu hành trình đi sứ nhiều sóng gió.',
                'rating'    => 0,
                'id_contries'   => 5,
                'id_author' => 4,
                'id_user_upload'    => 1,
                'id_language_original'  => 6,
                'date'  => '2023-11-28',
                'created_at' => $date,
                'updated_at' => $date,
            ],
        ]);

        $list = [
            // A Journey to Love (season 1)
            ['https://phimnew.com/watch/42336', 'https://phimnew.com/watch/42337', 'https://phimnew.com/watch/42338', 'https://phimnew.com/watch/42339', 'https://phimnew.com/watch/42340', 'https://phimnew.com/watch/42341', 'https://phimnew.com/watch/42342', 'https://phimnew.com/watch/42343', 'https://phimnew.com/watch/42344', 'https://phimnew.com/watch/42345', 'https://phimnew.com/watch/42346', 'https://phimnew.com/watch/42347', 'https://phimnew.com/watch/42348', 'https://phimnew.com/watch/42349', 'https://phimnew.com/watch/42350', 'https://phimnew.com/watch/42351'],
        ];

        $count = Movie::select(DB::raw('COUNT(id) as count'))->first();
        for ($i = 0; $i < $count->count; $i++) {
            for ($j = 0; $j < count($list[$i]); $j++) {
                $data['num_eps'] = $j + 1;
                $data['id_movies'] = $i + 1;
                $data['url'] = $list[$i][$j];
                Episode::create($data);
            }
        }
    }
}
