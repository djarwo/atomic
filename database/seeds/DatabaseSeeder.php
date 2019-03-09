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
        // $this->call(UsersTableSeeder::class);
        $this->call(DompetStatusTableSeeder::class);
        $this->call(KategoriStatusTableSeeder::class);
        $this->call(TransaksiStatusTableSeeder::class);   
    }
}
