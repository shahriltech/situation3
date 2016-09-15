<?php

use Illuminate\Database\Seeder;

class TodoitemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('todo_items')->insert([
        	'id' => 1,
            'todo_list_id' => 1,
            'content' => 'Task Introduction',
            'completed_on' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_checked' => 0,
        ],

        [
        	'id' => 2,
            'todo_list_id' => 1,
            'content' => 'Task Phase 2',
            'completed_on' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_checked' => 1,
        ],

        [
        	'id' => 3,
            'todo_list_id' => 2,
            'content' => 'Task Planning',
            'completed_on' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_checked' => 1,
        ],

        [
        	'id' => 4,
            'todo_list_id' => 2,
            'content' => 'Task Execution',
            'completed_on' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_checked' => 1,
        ],

        [
        	'id' => 5,
            'todo_list_id' => 1,
            'content' => 'Roundup',
            'completed_on' => '',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'todo_list_checked' => 1,
        ]);
    }
}
