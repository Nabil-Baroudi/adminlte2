<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'nabil.baroudi1997@gmail.com',
            'password' => bcrypt('12345678'),
            'is_admin' => 1,
            'email_verified_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
