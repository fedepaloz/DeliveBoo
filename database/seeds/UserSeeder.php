<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $user = new User();
        $user->name = 'admin';
        $user->email = 'admin@deliveboo.it';
        $user->password = bcrypt('admin');
        $user->save();

        // $user_ids = User::pluck('id')->toArray(); //recupero gli utenti
        for ($i = 0; $i < 17; $i++) {
            $user = new User();
            $user->name = $faker->userName();
            $user->email = $faker->email();
            $user->password = bcrypt('password');
            $user->save();
        }
    }
}
