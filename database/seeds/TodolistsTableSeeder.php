<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;
class TodolistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_lists')->insert([
        	'id' => 1,
            'name' => 'CMS To DO list',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_featured' => 1,
        ],

        [
        	'id' => 2,
            'name' => 'Game Java',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_featured' => 1,
        ],

        [
        	'id' => 3,
            'name' => '3rd Day Task',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_featured' => 0,
        ]);
    }
}
