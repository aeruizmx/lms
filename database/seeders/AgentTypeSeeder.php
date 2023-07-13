<?php

namespace Database\Seeders;

use App\Models\AgentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AgentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AgentType::create(['name' => 'Interno']);
        AgentType::create(['name' => 'Externo']);
        AgentType::create(['name' => 'Otro']);
    }
}
