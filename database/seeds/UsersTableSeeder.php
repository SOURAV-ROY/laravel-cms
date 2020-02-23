<?php

use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'admin@gmail.com')->first();

        if (!$user) {

            User::create([

                'name' => 'ADMIN',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => Hash::make('password')

            ]);
        }
    }
}
