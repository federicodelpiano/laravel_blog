<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('users')->insert([
            'username' => 'fede',
            'email' => 'fede@fede.com',
            'twitter_username' => 'fededelpianocod',
            'password' => bcrypt('fede'),
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('users')->insert([
            'username' => $faker->userName,
            'email' => $faker->unique()->safeEmail,
            'twitter_username' => Str::random(10),
            'password' => bcrypt('password'),
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
