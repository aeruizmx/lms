<?php

namespace Database\Seeders;

use App\Models\Institution;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstitutionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Institution::create(['name' => 'Pública']);
        Institution::create(['name' => 'Privada']);
        Institution::create(['name' => 'Ninguna']);
    }
}
