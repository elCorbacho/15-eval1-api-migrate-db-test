<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proyecto;

class proyectos extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $proyectos = [
            [
                'nombre' => 'Sistema de Inventario',
                'fecha_inicio' => '2025-01-10',
                'estado' => 'activo',
                'responsable' => 'Ana Torres',
                'monto' => 15000
            ],
            [
                'nombre' => 'Sitio Web Corporativo',
                'fecha_inicio' => '2025-02-05',
                'estado' => 'activo',
                'responsable' => 'Carlos Pérez',
                'monto' => 8000
            ],
            [
                'nombre' => 'App de Tareas',
                'fecha_inicio' => '2025-03-12',
                'estado' => 'inactivo',
                'responsable' => 'Lucía Gómez',
                'monto' => 5000
            ],
            [
                'nombre' => 'E-commerce',
                'fecha_inicio' => '2025-04-20',
                'estado' => 'activo',
                'responsable' => 'Miguel Rojas',
                'monto' => 20000
            ],
            [
                'nombre' => 'Blog Técnico',
                'fecha_inicio' => '2025-05-15',
                'estado' => 'activo',
                'responsable' => 'Sofía Ramírez',
                'monto' => 3000
            ],
            [
                'nombre' => 'Sistema de Reservas',
                'fecha_inicio' => '2025-06-01',
                'estado' => 'inactivo',
                'responsable' => 'Pedro Castillo',
                'monto' => 7000
            ],
            [
                'nombre' => 'Plataforma de Cursos',
                'fecha_inicio' => '2025-06-18',
                'estado' => 'activo',
                'responsable' => 'María López',
                'monto' => 12000
            ],
            [
                'nombre' => 'Gestor de Clientes',
                'fecha_inicio' => '2025-07-03',
                'estado' => 'activo',
                'responsable' => 'Juan Martínez',
                'monto' => 9000
            ],
            [
                'nombre' => 'Red Social',
                'fecha_inicio' => '2025-07-25',
                'estado' => 'inactivo',
                'responsable' => 'Valeria Díaz',
                'monto' => 25000
            ],
            [
                'nombre' => 'Sistema de Encuestas',
                'fecha_inicio' => '2025-08-10',
                'estado' => 'activo',
                'responsable' => 'Andrés Corbacho',
                'monto' => 6000
            ],
        ];

        foreach ($proyectos as $proyecto) {
            Proyecto::create($proyecto);
        }
    }
}