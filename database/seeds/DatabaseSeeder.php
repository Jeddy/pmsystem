<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(CorpSeeder::class);
        $this->call(DepartmentSeeder::class);
        $this->call(SpaceSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(UserCorpSeeder::class);
        $this->call(LineSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(ProductSeeder::class);
        $this->call(IssueSeeder::class);
        $this->call(FeatureSeeder::class);
    }
}
