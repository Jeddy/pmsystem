<?php

use Illuminate\Database\Seeder;

class CorpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\Corp::class, 5)->create();
    }
}
