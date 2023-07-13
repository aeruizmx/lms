<?php

namespace Database\Seeders;

use App\Models\Location;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Location::create(['identifier' => 414, 'location' => 'LAGUNA', 'address' => 'AV. CRISTOBAL COLON No. 726', 'zone_id' => 4, 'city_id' => 5, 'establishment_id' => 6, 'employer_registration_id' => 7 , 'active' => true]);
    }
}
