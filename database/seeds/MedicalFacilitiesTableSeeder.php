<?php

use Illuminate\Database\Seeder;
use App\MedicalFacility;

class MedicalFacilitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(MedicalFacility::class, 10)->create()->each(function ($f) {
            $f->save();
        });

    }
}
