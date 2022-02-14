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
        User::create([
            'name'=>'Daniel Pincay',
            'email'=>'alexispincay005@gmail.com',
            'password'=>bcrypt('515t3m45')
        ]);
        User::factory(99)->create();
    }
}
