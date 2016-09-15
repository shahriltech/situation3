<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class RonsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */


    public function run()
    {
        DB::table('rons')->insert([
        	'id' => 1,
            'attend' => 'No',
            'reason' => 'Meeting',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
