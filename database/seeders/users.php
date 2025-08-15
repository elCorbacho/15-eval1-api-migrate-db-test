<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class users extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'name' => 'Andrés Corbacho',
                'email' => 'corbacho@gmail.com',
                'password' => bcrypt('password123')
            ],
            [
                'name' => 'Ana Torres',
                'email' => 'ana.torres@gmail.com',
                'password' => bcrypt('password123')
            ],
            [
                'name' => 'Carlos Pérez',
                'email' => 'carlos.perez@gmail.com',
                'password' => bcrypt('password123')
            ],
            [
                'name' => 'Lucía Gómez',
                'email' => 'lucia.gomez@gmail.com',
                'password' => bcrypt('password123')
            ],
            [
                'name' => 'Miguel Rojas',
                'email' => 'miguel.rojas@gmail.com',
                'password' => bcrypt('password123')
            ],
        ];

        foreach ($usuarios as $usuario) {
            User::create($usuario);
        }
    }
}