<?php

namespace Database\Seeders;

use App\Models\ModuleMaterials;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ModuleMaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModuleMaterials::factory(10)->create();

    }
}
