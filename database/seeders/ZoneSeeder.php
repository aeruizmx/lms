<?php

namespace Database\Seeders;

use App\Models\Zone;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ZoneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Zone::create(['zone' => 'TEPIC', 'organization_id' => 1]);
        Zone::create(['zone' => 'PACIFICO', 'organization_id' => 1]);
        Zone::create(['zone' => 'GUZMAN', 'organization_id' => 1]);
        Zone::create(['zone' => 'GUADALAJARA', 'organization_id' => 1]);
        Zone::create(['zone' => 'BADEBA', 'organization_id' => 1]);
        Zone::create(['zone' => 'MORELIA', 'organization_id' => 1]);
        Zone::create(['zone' => 'SAN JORGE', 'organization_id' => 2]);
        Zone::create(['zone' => 'SANTA FE', 'organization_id' => 3]);
        Zone::create(['zone' => 'TOC', 'organization_id' => 4]);
        Zone::create(['zone' => 'TEXCO', 'organization_id' => 5]);
        Zone::create(['zone' => 'CARVER', 'organization_id' => 6]);
    }
}
