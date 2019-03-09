<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create( [
    		'id'        =>1,
            'name'      =>'djarwo',
            'email'     =>'djarwoprasojo@gmail.com',
            'password'  =>'password',
    		'created_at'=>'2019-03-10 04:31:48',
    		'updated_at'=>'2019-03-10 04:31:48'
        ] );
    }
}
