<?php

namespace Database\Seeders;

use App\Models\EmployeerRegistration;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmployeerRegistrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EmployeerRegistration::create(['code' => 'Z4512942104']);
        EmployeerRegistration::create(['code' => 'Y4322643109']);
        EmployeerRegistration::create(['code' => 'D3559367106']);
        EmployeerRegistration::create(['code' => 'C1414119101']);
        EmployeerRegistration::create(['code' => 'Z2968663109']);
        EmployeerRegistration::create(['code' => 'B9851775104']);
        EmployeerRegistration::create(['code' => 'S3511036107']);
        EmployeerRegistration::create(['code' => 'B8430364109']);
        EmployeerRegistration::create(['code' => 'H6313607101']);
        EmployeerRegistration::create(['code' => 'H5712714104']);
        EmployeerRegistration::create(['code' => 'B9714060108']);
        EmployeerRegistration::create(['code' => 'D3527737109']);
        EmployeerRegistration::create(['code' => 'B8424989101']);
        EmployeerRegistration::create(['code' => 'B841695810']);
    }
}
