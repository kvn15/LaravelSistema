<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Brand::create(['name' => 'Panadol', 'estado' => 1]);
        Brand::create(['name' => 'Paracetamol', 'estado' => 0]);
        Brand::create(['name' => 'Lays', 'estado' => 1]);
        Brand::create(['name' => 'Alicord', 'estado' => 1]);
        Brand::create(['name' => 'Backus', 'estado' => 1]);
    }
}
