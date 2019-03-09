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
        User::create( [
    		'id'        =>1,
            'name'      =>'djarwo',
            'email'     =>'djarwoprasojo@gmail.com',
            'password'  =>'$2y$10$Q9nUA1Yn1JSFvSeFqM54vOIAdEUjzPcdPxh7y2klPLx.cVn.hsRXG', // password
    		'created_at'=>'2019-03-10 04:31:48',
    		'updated_at'=>'2019-03-10 04:31:48'
        ] );
    }

    // foreach ($this->data as $_data) {
    //     $user = \App\User::create($_data);
    // }
}
