<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     DB::table('users')->insert([
    //         'name' => 'ramacan',
    //         'email' => 'ramacan@gmail.com',
    //         'password' => bcrypt('tetap10jam'),
    //     ]);
    // }

    public function run()
    {
        User::insert([
        	[
            'username' => 'ramacan',
        	'name' => 'Rama Can',
            'email' => 'ramacan@gmail.com',
            'password' => bcrypt('tetap10jam'),
            'role'  => 'admin'
        	]
        ]);
    }
}
