<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        // Do not forget to put here new SEEDERS! =========!
        $this->call(RolesTableSeeder::class);
        $this->call(BlogsTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
    }
}
