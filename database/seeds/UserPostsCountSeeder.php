<?php

use Illuminate\Database\Seeder;

class UserPostsCountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\UserPostCount::class, 50)->create();

    }
}
