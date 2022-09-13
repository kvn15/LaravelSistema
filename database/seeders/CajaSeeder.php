<?php

namespace Database\Seeders;

use App\Models\Caja;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CajaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Caja::create(['codigo' => '00001','name' => 'Caja Principal', 'estado' => 1, 'importe_caja' => 1000.00]);
        Caja::create(['codigo' => '00002','name' => 'Caja Secundaria', 'estado' => 1, 'importe_caja' => 500.00]);
    }
}
