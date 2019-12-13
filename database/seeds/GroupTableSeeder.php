<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GroupTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('groups')->insert([
            'group_name' => 'Friends',
            'detail' => 'a contact group to organize friends and relatives',
        ]);

        DB::table('groups')->insert([
            'group_name' => 'Family',
            'detail' => 'a contact group to organize the family',
        ]);

        DB::table('groups')->insert([
            'group_name' => 'Work',
            'detail' => 'a contact group to organize coworkers',
        ]);

        DB::table('groups')->insert([
            'group_name' => 'Food',
            'detail' => 'a contact group to organize customer dining venues',
        ]);
    }
}
