<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $users =  [
            [
                'name' => 'Michael Aries Yap',
                'username' => 'aRhiExz',
                'contact' => '09551387497',
                'profile_img' => '1.jpg',
                'is_admin' => '1',
                'status' => '1',
                'email' => 'aRhiExz@gmail.com',
                'password' => bcrypt('admin123'),
            ],
            [
                'name' => 'Student Services Department',
                'username' => 'admin',
                'contact' => '09123456789',
                'profile_img' => '1.jpg',
                'is_admin' => '1',
                'status' => '1',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('admin123'),
            ]
        ];
        User::insert($users);
    }
}
