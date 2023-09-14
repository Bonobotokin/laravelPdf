<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('users')->delete();

        $user = [
            'name' => 'BonoboTokin',
            'email' => 'bonobotokin@admin.com',
            'password' => bcrypt('23@tokin.DEV')
        ];

        User::insert($user);
    }
}
