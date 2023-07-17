<?php

namespace Database\Seeders;

use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        State::create(['id' => 1, 'name' => 'AGUASCALIENTES']);
        State::create(['id' => 2, 'name' => 'BAJA CALIFORNIA']);
        State::create(['id' => 3, 'name' => 'BAJA CALIFORNIA SUR']);
        State::create(['id' => 4, 'name' => 'CAMPECHE']);
        State::create(['id' => 5, 'name' => 'COAHUILA']);
        State::create(['id' => 6, 'name' => 'COLIMA']);
        State::create(['id' => 7, 'name' => 'CHIAPAS']);
        State::create(['id' => 8, 'name' => 'CHIHUAHUA']);
        State::create(['id' => 9, 'name' => 'DISTRITO FEDERAL']);
        State::create(['id' => 10, 'name' => 'DURANGO']);
        State::create(['id' => 11, 'name' => 'GUANAJUATO']);
        State::create(['id' => 12, 'name' => 'GUERRERO']);
        State::create(['id' => 13, 'name' => 'HIDALGO']);
        State::create(['id' => 14, 'name' => 'JALISCO']);
        State::create(['id' => 15, 'name' => 'MEXICO']);
        State::create(['id' => 16, 'name' => 'MICHOACAN']);
        State::create(['id' => 17, 'name' => 'MORELOS']);
        State::create(['id' => 18, 'name' => 'NAYARIT']);
        State::create(['id' => 19, 'name' => 'NUEVO LEON']);
        State::create(['id' => 20, 'name' => 'OAXACA']);
        State::create(['id' => 21, 'name' => 'PUEBLA']);
        State::create(['id' => 22, 'name' => 'QUERETARO']);
        State::create(['id' => 23, 'name' => 'QUINTANA ROO']);
        State::create(['id' => 24, 'name' => 'SAN LUIS POTOSI']);
        State::create(['id' => 25, 'name' => 'SINALOA']);
        State::create(['id' => 26, 'name' => 'SONORA']);
        State::create(['id' => 27, 'name' => 'TABASCO']);
        State::create(['id' => 28, 'name' => 'TAMAULIPAS']);
        State::create(['id' => 29, 'name' => 'TLAXCALA']);
        State::create(['id' => 30, 'name' => 'VERACRUZ DE IGNACIO DE LA LLAVE']);
        State::create(['id' => 31, 'name' => 'YUCATAN']);
        State::create(['id' => 32, 'name' => 'ZACATECAS']);
    }
}
