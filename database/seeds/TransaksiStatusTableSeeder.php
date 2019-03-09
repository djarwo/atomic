<?php

use Illuminate\Database\Seeder;
use App\TransaksiStatus;

class TransaksiStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        TransaksiStatus::create( [
    		'id'        =>1,
    		'nama'      =>'Masuk',
    		'created_at'=>'2019-03-10 04:31:48',
    		'updated_at'=>'2019-03-10 04:31:48'
        ] );
        
        TransaksiStatus::create( [
    		'id'        =>2,
    		'nama'      =>'Keluar',
    		'created_at'=>'2019-03-10 04:31:48',
    		'updated_at'=>'2019-03-10 04:31:48'
		] );
    }
}
