<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Ahmed Mohmed',
                'email' => 'user@gmail.com'
            ]
        ];
        foreach($users as $user) {
            User::create([
                'name' =>$user['name'],
                'email' =>$user['email']
            ]);
        }
    }
}
