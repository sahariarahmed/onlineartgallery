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
                'name'=>'Sahariar Ahmed Tonmoy',
                'email'=>'sahariarahmed11@gmail.com',
                'password'=>bcrypt('123456'),
            ]);
    }
}
