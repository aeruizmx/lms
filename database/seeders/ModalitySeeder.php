<?php

namespace Database\Seeders;

use App\Models\Modality;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModalitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Modality::create(['name' => 'Presencial']);
        Modality::create(['name' => 'En línea']);
        Modality::create(['name' => 'Mixta']);
    }
}
