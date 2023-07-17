<?php

namespace Database\Seeders;

use App\Models\Study;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Study::create(['name' => 'Ninguno']);
        Study::create(['name' => 'Primaria']);
        Study::create(['name' => 'Secundaria']);
        Study::create(['name' => 'Bachillerato']);
        Study::create(['name' => 'Carrera técnica']);
        Study::create(['name' => 'Licenciatura']);
        Study::create(['name' => 'Especialidad']);
        Study::create(['name' => 'Maestría']);
        Study::create(['name' => 'Doctorado']);
    }
}
