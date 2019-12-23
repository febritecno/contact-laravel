<?php

use Illuminate\Database\Seeder;
use App\Contact;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
    	$this->call(GroupTableSeeder::class);
    }
}
