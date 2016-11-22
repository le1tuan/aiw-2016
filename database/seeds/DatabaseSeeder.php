<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Model::unguard();

        $this->call("CategorySeeder");
        $this->call("TagSeeder");
        $this->call("NewsSeeder");
        $this->call("NewsTagSeeder");
        $this->call("NewsComment");
        Model::reguard();
]
        // $this->call(UsersTableSeeder::class);
    }
}
