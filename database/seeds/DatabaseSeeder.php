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
        $this->truncateTables([
            // Truncates Owners
            'owners',
            // Truncates Cars
            'cars',
            // Truncates Users
            'users',
        ]);

        // $this->call(UserSeeder::class);
        $this->call(OwnerSeeder::class);
        $this->call(CarSeeder::class);
    }

    protected function truncateTables(array $tables)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($tables as $table){
            DB::table($table)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
