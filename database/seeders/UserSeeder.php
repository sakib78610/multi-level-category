<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->where('email','user@test01.com')->count() == 0) {
            DB::table('users')->insert([
                'name'     => 'User',
                'email'    => 'user@test01.com',
                'password' => bcrypt('123456'),
                'user_type' => 2,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
