<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name'=>'Admin',
                'email'=>'admin@asiatech.cloud',
                'level'=> User::ADMIN,
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User',
                'email'=>'user@asiatech.cloud',
                'level'=> User::USER,
                'password'=> bcrypt('123456'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::query()->create($value);
        }
    }
}
