<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Vulnerabilidad;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            //RoleSeeder::class,
            CategoriaServicioSeeder::class,
            ServicioSeeder::class,
            ServicioIncluyeSeeder::class,
            VulnerabilidadSeeder::class,
            ClienteSeeder::class,
            //AuditoriaSeeder::class,
            ValoracionSeeder::class,
        ]);
        // User::factory(10)->create();

        /*User::factory()->create([
            'name' => 'Test User',
            'emails' => 'test@example.com',
        ]);*/
    }
}
