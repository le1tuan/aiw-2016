<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $category = array(
            array('name' => 'POLITICS','created_at' => '2016-11-16 07:27:50','updated_at' => '2016-11-16 07:27:50')
        );
        DB::table('category')->insert($category);
        // $this->call(UsersTableSeeder::class);
    }
}
