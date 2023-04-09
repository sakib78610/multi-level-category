<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (DB::table('users')->where('email','admin@codebuddy.com')->count() == 0) {
            DB::table('users')->insert([
                'name'     => 'Admin',
                'email'    => 'admin@codebuddy.com',
                'password' => bcrypt('123456'),
                'user_type' => 1,
                'email_verified_at' => now(),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
