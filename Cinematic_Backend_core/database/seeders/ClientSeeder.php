<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $date = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString(); // get datetime now // get datetime now  // get datetime now
        DB::table('clients')->delete();
        DB::table('clients')->truncate();
        DB::table('clients')->insert([
            [
                'name' => 'Nguyen Van A',
                'email' => 'nguyenvana@gmail.com',
                'password' => bcrypt('password123'),
                'forget_password_token' => 'dsajkfh249q1sznzzsdf',
                'email_verify_token' => 't-ss-1243-s-x',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Le Van C',
                'email' => 'levanc@gmail.com',
                'password' => bcrypt('securepass'),
                'forget_password_token' => 'zxcvbnm0987poiuyt',
                'email_verify_token' => 't-ss-9012-a-b',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Pham Thi D',
                'email' => 'phamthid@gmail.com',
                'password' => bcrypt('userpass123'),
                'forget_password_token' => 'qwe123poi987lkj',
                'email_verify_token' => 't-ss-3456-c-d',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Vu Van E',
                'email' => 'vuvane@gmail.com',
                'password' => bcrypt('pass1234'),
                'forget_password_token' => 'lkj789poi456zxc',
                'email_verify_token' => 't-ss-6789-e-f',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Do Thi F',
                'email' => 'dothif@gmail.com',
                'password' => bcrypt('securepassword'),
                'forget_password_token' => 'mnbv0987poi345lk',
                'email_verify_token' => 't-ss-0123-g-h',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Hoang Van G',
                'email' => 'hoangvang@gmail.com',
                'password' => bcrypt('pass1234'),
                'forget_password_token' => 'qazwsx0987poiuyt',
                'email_verify_token' => 't-ss-4567-i-j',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Mai Thi H',
                'email' => 'maithih@gmail.com',
                'password' => bcrypt('securepassword'),
                'forget_password_token' => 'plmko0987poi345lk',
                'email_verify_token' => 't-ss-7890-k-l',
                'created_at' => $date,
                'updated_at' => $date,
            ],
            [
                'name' => 'Dinh Van I',
                'email' => 'dinhvani@gmail.com',
                'password' => bcrypt('pass1234'),
                'forget_password_token' => 'qazwsx1234poiuyt',
                'email_verify_token' => 't-ss-1234-m-n',
                'created_at' => $date,
                'updated_at' => $date,
            ],
        ]);
    }
}
