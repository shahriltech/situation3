<?php

use Illuminate\Database\Seeder;
use App\User;
//use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('users')->insert([
        // 	'id' => 1,
        //     'name' => 'admin',
        //     'email' => 'admin@situation.com',
        //     'password' => bcrypt('secret'),
        //     'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        //     'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            
        // ]);
        User::create([
            'name' => 'Admin',
            'email' => 'admin@situation.com',
            'password' => bcrypt('kraken123')
        ]);
    }
}
