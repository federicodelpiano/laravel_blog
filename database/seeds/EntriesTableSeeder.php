<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        DB::table('entries')->insert([
            'title' => 'Oldest entry',
            'content' => $faker->text(100),
            'user_id' => 1,
            'created_at' => '2020-01-21 21:17:17',
            'updated_at' => now()
        ]);

        DB::table('entries')->insert([
            'title' => 'Newest entry',
            'content' => $faker->text(100),
            'user_id' => 1,
            'created_at' => '2021-01-21 21:17:17',
            'updated_at' => now()
        ]);

        DB::table('entries')->insert([
            'title' => $faker->text(20),
            'content' => $faker->text(100),
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('entries')->insert([
            'title' => $faker->text(20),
            'content' => $faker->text(100),
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('entries')->insert([
            'title' => $faker->text(20),
            'content' => $faker->text(100),
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        DB::table('entries')->insert([
            'title' => $faker->text(20),
            'content' => $faker->text(100),
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
