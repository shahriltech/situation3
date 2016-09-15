<?php

use Illuminate\Database\Seeder;

use Carbon\Carbon;

class AttendancesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('attendances')->insert([
        	'id' => 1,
            'name' => 'Timmy',
            'attend' => 'Yes',
            'leave_type' => 'EL',
            'day' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ],
        [
        	'id' => 2,
            'name' => 'Szekerng',
            'attend' => 'Yes',
            'leave_type' => 'AL',
            'day' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
