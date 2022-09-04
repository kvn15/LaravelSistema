<?php

namespace Database\Seeders;

use App\Models\Identification;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IdentificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Identification::create(['name' => 'DNI' ]);
        Identification::create(['name' => 'RUC' ]);
        Identification::create(['name' => 'CARNET EXT.' ]);
        Identification::create(['name' => 'PASAPORTE' ]);
    }
}
