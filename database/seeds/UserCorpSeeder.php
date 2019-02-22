<?php

use Illuminate\Database\Seeder;

class UserCorpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\UserCorp::class, 200)->create();
    }
}
