<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class TowtrucksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('towtrucks')->insert([
        	'id' => 1,
            'seen' => 'Yes',
            'location' => 'Public Bank',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
