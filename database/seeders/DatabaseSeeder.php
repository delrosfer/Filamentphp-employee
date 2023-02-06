<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $user = User::factory()->create([
         'name' => 'Silverio del Rosario',
         'email' => 'plussilver@hotmail.com',
        ]);
        $role = Role::create(['name' => 'Administrador']);

        $user->assignRole($role);
    }
}
