<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Faker\Factory as Faker;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // User::truncate();
        // $faker = Faker::create();
        // foreach(range(1,10) as $value){
        //     DB::table('users')->insert([
        //         'name' => $faker->name,
        //         'username' => $faker->username,
        //         'contact' => $faker->phonenumber,
        //         'profile_img' => '1.jpg',
        //         'is_admin' => '1',
        //         'status' => '1',
        //         'email' => $faker->email,
        //         'password' => bcrypt($faker->password),
        //     ]);
        // }
        // DB::table('users')->delete();
        

        $users =  [
            [
                'name' => 'Student Services Department',
                'user_id' => '2019-35744',
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
