<?php
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

/**
 * Created by PhpStorm.
 * User: Le Tuan Anh
 * Date: 11/22/2016
 * Time: 9:03 PM
 */
class NewsComment extends Seeder{
    public function run(){
        $news_comment = array(
            array('author' => 'le','content' => '123','news_id' => '2','created_at' => '2016-11-16 07:07:24','updated_at' => '2016-11-16 07:07:24'),
            array('author' => 'trump','content' => 'vô ??i','news_id' => '3','created_at' => '2016-11-16 07:36:07','updated_at' => '2016-11-16 07:36:07'),
            array('author' => 'le','content' => 'so what ?','news_id' => '3','created_at' => '2016-11-16 14:04:26','updated_at' => '2016-11-16 14:04:26'),
            array('author' => 'le','content' => 'sao ?','news_id' => '3','created_at' => '2016-11-16 14:04:33','updated_at' => '2016-11-16 14:04:33'),
            array('author' => '123','content' => 'ádasdads','news_id' => '3','created_at' => '2016-11-17 13:51:04','updated_at' => '2016-11-17 13:51:04'),
            array('author' => '123','content' => 'toi toi toi','news_id' => '3','created_at' => '2016-11-17 16:10:35','updated_at' => '2016-11-17 16:10:35'),
            array('author' => 'a','content' => 'chiu chiu chiu','news_id' => '3','created_at' => '2016-11-17 16:14:20','upda016-11-17 16:14:20'),
            array('id' => '78','author' => 'adas','content' => 'asdasdasdads','news_id' => '3','created_at' => '2016-11-17 16:16:14','updated_at' => '2016-11-17 16:16:14'),
            array('author' => 'a','content' => '123','news_id' => '3','created_at' => '2016-11-17 16:22:24','updated_at' => '2016-11-17 16:22:24'),
            array('author' => 'chim se','content' => '?i n?ng','news_id' => '3','created_at' => '2016-11-17 16:25:02','updated_at' => '2016-11-17 16:25:02'),
            array('author' => 'th? à','content' => 'ádasdas','news_id' => '3','created_at' => '2016-11-17 16:25:27','updated_at' => '2016-11-17 16:25:27'),
            array('author' => 'clgt','content' => '3s 1 l?n','news_id' => '3','created_at' => '2016-11-17 16:45:07','updated_at' => '2016-11-17 16:45:07'),
            array('author' => 'ádasd','content' => 'ádasdasda','news_id' => '3','created_at' => '2016-11-17 16:54:44','updated_at' => '2016-11-17 16:54:44'),
            array('author' => 'ádasd','content' => '12312312313','news_id' => '3','created_at' => '2016-11-17 16:58:10','updated_at' => '2016-11-17 16:58:10'),
            array('author' => 'ádasda','content' => 'sdasdasda','news_id' => '3','created_at' => '2016-11-17 17:05:43','updated_at' => '2016-11-17 17:05:43'),
            array('author' => 'ádasda','content' => '123','news_id' => '3','created_at' => '2016-11-17 17:05:52','updated_at' => '2016-11-17 17:05:52'),
            array('author' => '?âsd','content' => 'ádasdad','news_id' => '3','created_at' => '2016-11-17 17:09:17','updated_at' => '2016-11-17 17:09:17'),
            array('author' => 'ádasd','content' => 'ádasdasdad','news_id' => '3','created_at' => '2016-11-17 17:23:27','updated_at' => '2016-11-17 17:23:27'),
            array('author' => '123123','content' => '123123123','news_id' => '3','created_at' => '2016-11-17 17:24:21','updated_at' => '2016-11-17 17:24:21'),
            array('author' => '123123','content' => 'adsasdasd','news_id' => '3','created_at' => '2016-11-17 17:25:56','updated_at' => '2016-11-17 17:25:56'),
            array('author' => 'bvb','content' => 'bvb','news_id' => '3','created_at' => '2016-11-17 17:33:55','updated_at' => '2016-11-17 17:33:55'),
            array('author' => 'le','content' => 'hay','news_id' => '4','created_at' => '2016-11-21 19:09:19','updated_at' => '2016-11-21 19:09:19'),
            array('author' => 'le','content' => 'vch gi?t','news_id' => '4','created_at' => '2016-11-21 19:09:53','updated_at' => '2016-11-21 19:09:53'),
            array('author' => 'le','content' => 'gi?t ??','news_id' => '4','created_at' => '2016-11-21 19:10:54','updated_at' => '2016-11-21 19:10:54'),
            array('author' => 'le','content' => 'gi?t vcl ???','news_id' => '4','created_at' => '2016-11-21 19:11:05','updated_at' => '2016-11-21 19:11:05')
        );
        DB::table('news_comment')->insert($news_comment);
    }
}