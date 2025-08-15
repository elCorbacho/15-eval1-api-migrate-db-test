<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class proyectos_factory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Proyecto::factory()->count(10)->create();
    }
}