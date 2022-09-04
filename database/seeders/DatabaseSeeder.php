<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Client;
use App\Models\Identification;
use App\Models\Person;
use App\Models\User;
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
        \App\Models\Person::factory(10)->create();
        $this->call(RoleSeeder::class);
        User::create([
            'nameUser' => 'admin',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => 'Kevin Blas Huamán',
            'person_id' => Person::inRandomOrder()->first()->id
        ])->assignRole('Admin');

        User::create([
            'nameUser' => 'roger',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'name' => 'Roger Blas Huamán',
            'person_id' => Person::inRandomOrder()->first()->id
        ])->assignRole('Lector');

        $this->call(IdentificationSeeder::class);
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Client::factory(15)->create();
    }
}
