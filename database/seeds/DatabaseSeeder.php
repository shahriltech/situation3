<?php

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
         $this->call(UsersTableSeeder::class);
         $this->call(AttendancesTableSeeder::class);
         $this->call(RonsTableSeeder::class);
         $this->call(TodoitemsTableSeeder::class);
         $this->call(TodolistsTableSeeder::class);
         $this->call(TowtrucksTableSeeder::class);
             
    }
}
