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
         $this->call(CustomersTableSeeder::class);
         $this->call(MedicalFacilitiesTableSeeder::class);
         $this->call(HazardsTableSeeder::class);
         $this->call(RolesTableSeeder::class);
    }
}
