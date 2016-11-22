<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 11/22/2016
 * Time: 9:06 PM
 */
class NewsTagSeeder extends Seeder{
    public function run(){
        $news_tag = array(
            array('news_id' => '2','tag_id' => '2'),
            array('news_id' => '2','tag_id' => '3'),
            array('news_id' => '3','tag_id' => '4'),
            array('news_id' => '3','tag_id' => '5'),
            array('news_id' => '4','tag_id' => '6'),
            array('news_id' => '4','tag_id' => '7')
        );
        DB::table('news_tag')->insert($news_tag);
    }
}