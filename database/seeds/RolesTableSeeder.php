<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("roles")->insert([  
            ["code" => "admin", "name" => "Administrator", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],   
            ["code" => "user", "name" => "User", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],    
        ]);
    }
}
