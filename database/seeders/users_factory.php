<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class users_factory extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->count(10)->create();
    }
}