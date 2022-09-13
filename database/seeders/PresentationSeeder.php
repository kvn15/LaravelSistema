<?php

namespace Database\Seeders;

use App\Models\Presentation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PresentationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presentation::create(['name' => 'Caja', 'estado' => 1]);
        Presentation::create(['name' => 'Bolsa', 'estado' => 1]);
    }
}
