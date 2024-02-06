<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EmployeeSeeder extends Seeder
{
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now // get datetime now  // get datetime now
        DB::table('employees')->delete();
        DB::table('employees')->truncate();
        DB::table('employees')->insert([
            [
                'name'          => 'Admin',
                'email'         => 'admin@gmail.com',
                'password'      => bcrypt('123123'),
                'id_permissons' => 1,
            ]
        ]);
    }
}
