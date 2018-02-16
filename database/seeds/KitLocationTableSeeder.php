<?php

use Illuminate\Database\Seeder;

class KitLocationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\KitLocation::class, 10)->create()->each(function ($location) {
            $location->save();
        });
    }
}
