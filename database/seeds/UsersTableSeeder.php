<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create Test User with 3 entries
        factory(App\User::class, 1)
        ->create([
            'username' => 'federico',
            'email' => 'federico@federico.com',
            'twitter_username' => 'DpFederico',
        ])->each(function ($user) {
            $user->entries()->createMany(
                factory(App\Entry::class, 3)->make()->toArray()
            );
        });

        // Create 10 more users with 3 entries each
        factory(App\User::class, 10)
        ->create()
        ->each(function ($user) {
            $user->entries()->createMany(
                factory(App\Entry::class, 3)->make()->toArray()
            );
        });
    }
}
