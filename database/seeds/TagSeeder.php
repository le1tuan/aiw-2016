<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 11/22/2016
 * Time: 8:55 PM
 */
class TagSeeder extends Seeder{
        public function run(){
            $tag = array(
                array('name' => 'politic5555','created_at' => '2016-11-08 06:37:28','updated_at' => '2016-11-08 15:22:01'),
                array('name' => 'politic','created_at' => '2016-11-08 06:41:54','updated_at' => '2016-11-08 06:41:54'),
                array('name' => ' ','created_at' => '2016-11-16 07:28:02','updated_at' => '2016-11-16 07:28:02'),
                array('name' => 'politics','created_at' => '2016-11-16 07:29:29','updated_at' => '2016-11-16 07:29:29'),
                array('name' => 'trump','created_at' => '2016-11-16 07:29:29','updated_at' => '2016-11-16 07:29:29'),
                array('name' => 'trump','created_at' => '2016-11-17 15:42:47','updated_at' => '2016-11-17 15:42:47'),
                array('name' => 'america','created_at' => '2016-11-17 15:42:47','updated_at' => '2016-11-17 15:42:47')
            );
            DB::table('tag')->insert($tag);

        }

}