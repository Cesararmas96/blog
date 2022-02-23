<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;


class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        User::create([
            'name' => 'bloger',

            'email' => 'bloger@gmail.com',
            'password' => bcrypt('1234')
        ]);
        //
        User::factory(9)->create();
    }
}
//