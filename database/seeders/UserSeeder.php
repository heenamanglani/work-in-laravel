<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class UserSeeder extends Seeder
{
    /**
     * Technically, using Faker is a right approach but to create a hardcoded API and response in postman, i chose to
     * create testable data - feel free to change if needed
     *
     * Run the database seeds.
     *
     * @return void
     */
    /*public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            DB::table('users')->insert([
                'username'   => Str::random(10),
                'uid'        => Str::uuid()->toString(),
                'email'      => Str::random(10) . '@gmail.com',
                'password'   => Hash::make('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }*/

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 5; $i++) {
            DB::table('users')->insert([
                'username'   => "scootin".$i,
                'uid'        => "84111ed1-de60-4b09-a0da-c06aa674fa1".$i,
                'email'      => Str::random(10) . '@gmail.com',
                'password'   => Hash::make('password'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]);
        }
    }
}
