<?php

namespace Database\Seeders;

use App\Models\Organization;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organization::create(['name' => 'GRUPO OCTANO', 'rfc' => 'GOC9303301F4']);
        Organization::create(['name' => 'CENTRO CARRETERO SAN JORGE', 'rfc' => 'CCS000127521']);
        Organization::create(['name' => 'SUPER SERVICIO GASOLINERO SANTA FE', 'rfc' => 'SSG060829BP5']);
        Organization::create(['name' => 'TRANSPORTES OCTANO', 'rfc' => 'TOC9412131Z3']);
        Organization::create(['name' => 'TRANSPORTE DE EXPLOSIVOS Y COMBUSTIBLE', 'rfc' => 'TEC930420LS0']);
        Organization::create(['name' => 'COMBUSTIBLES CARVER', 'rfc' => 'CCA060606NS8']);
    }
}
