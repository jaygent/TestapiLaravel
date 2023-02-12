<?php

namespace Database\Seeders;

use App\Models\Materials;
use Illuminate\Database\Seeder;

class MaterialsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Materials::factory(20000)->create();
    }
}
