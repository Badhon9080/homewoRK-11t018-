<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users= [
            [
                "name"=>"badhon",
                "email"=>"badhonsen19998@mail.com",
                "password"=>Hash::make("password"),
            ],
            [
                "name"=>"test",
                "email"=>"test19998@mail.com",
                "password"=>Hash::make("password"),
            ],
        ];
        foreach($users as $user)
        {User::create($user);
             //$newUser = new User();
             //$newUser->name = $user->name;

        }
    }
}