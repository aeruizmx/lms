<?php

namespace Database\Seeders;

use App\Models\StudyDocument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StudyDocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        StudyDocument::create(['name' => 'Título']);
        StudyDocument::create(['name' => 'Certificado']);
        StudyDocument::create(['name' => 'Diploma']);
        StudyDocument::create(['name' => 'Otro']);
        StudyDocument::create(['name' => 'Ninguno']);
    }
}
