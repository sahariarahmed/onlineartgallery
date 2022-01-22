<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'role'=>'admin',
                'name'=>'redborn',
                'email'=>'a@a.a',
                'password'=>bcrypt('123'),
            ]);
    }
}
