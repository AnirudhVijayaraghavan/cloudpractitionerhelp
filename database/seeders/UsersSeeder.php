<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $users = [
            [
                'name' => 'Anirudh Vijayaraghavan',
                'email' => 'anirudh1997@hotmail.com',
                'password' => 'Adadad@131313',
                'isAdmin' => 1,
            ],
            [
                'name' => 'anirudhv1',
                'email' => 'aniroxta@gmail.com',
                'password' => 'Adadad@131313',
                'credits' => 50
            ],
            [
                'name' => 'anirudhv2',
                'email' => 'aniroxtausa@gmail.com',
                'password' => 'Adadad@131313'
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
