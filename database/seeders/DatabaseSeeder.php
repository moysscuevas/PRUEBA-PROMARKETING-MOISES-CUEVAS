<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Permission;

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

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Permission::firstOrCreate([
            'name' => 'create player notes',
            'guard_name' => 'web',
        ]);

        $user = User::factory()->create([
            'name' => 'Administrador',
            'email' => 'admin@test.com',
        ]);

        $user->givePermissionTo('create player notes');

        $this->call([
            PlayerSeeder::class,
            PlayerNoteSeeder::class,
        ]);
    }
}
