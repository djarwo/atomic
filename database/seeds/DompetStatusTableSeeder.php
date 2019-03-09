<?php

use Illuminate\Database\Seeder;
use App\DompetStatus;

class DompetStatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DompetStatus::create( [
    		'id'        =>1,
    		'nama'      =>'Aktif',
    		'created_at'=>'2019-03-10 04:31:48',
    		'updated_at'=>'2019-03-10 04:31:48'
        ] );
        
        DompetStatus::create( [
    		'id'        =>2,
    		'nama'      =>'Tidak Aktif',
    		'created_at'=>'2019-03-10 04:31:48',
    		'updated_at'=>'2019-03-10 04:31:48'
		] );
    }
}
