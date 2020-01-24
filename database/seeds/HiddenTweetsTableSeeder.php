<?php

use Illuminate\Database\Seeder;

class HiddenTweetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hidden_tweets')->insert([
            'tweet_id' => '1215867123844747264',
            'user_id' => 1
        ]);
    }
}
