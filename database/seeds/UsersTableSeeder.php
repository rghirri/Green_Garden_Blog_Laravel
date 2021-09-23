<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\Hash;

use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::where('email', 'rayaa_ghirri@yahoo.com')->first();

        if (!$user)
        {
            User::create([
                'name'      => 'Rayaa Ghirri',
                'email'     => 'rayaa_ghirri@yahoo.com',
                'role'      =>  'admin',
                'password'  =>  Hash::make('password')
            ]);
        }
    }
}