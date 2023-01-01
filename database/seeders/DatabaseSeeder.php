<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Role::factory()->create([
           'name' => 'Admin'
        ]);

        Role::factory()->create([
            'name' => 'Editor'
        ]);

        Role::factory()->create([
            'name' => 'Viewer'
        ]);
    }
}
