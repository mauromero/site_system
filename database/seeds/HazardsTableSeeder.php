<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class HazardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("hazards")->insert([
            ["name" => "Underground", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Overhead", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Weather", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],  
            ["name" => "Traffic", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Fire", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Confinded Spaces", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Electrical", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Equipment", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Chemical", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Sound", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Rigging & Hoisting", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Environmental", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "PPE", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Uneven Ground", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Pedestrian", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Health", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Air Quality", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Tranches", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Water", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Animal", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Trucking", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Ladder", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Tanks", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Light", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Fall", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Airborne", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Pressure", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Tripping", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Pinch Points", "created_at" => Carbon::now(), "updated_at" => Carbon::now()],  
            ["name" => "Employee", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Permits Needed", "created_at" => Carbon::now(), "updated_at" => Carbon::now()], 
            ["name" => "Checkbox", "created_at" => Carbon::now(), "updated_at" => Carbon::now()]
            
        ]);
    }
}
