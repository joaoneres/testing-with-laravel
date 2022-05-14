<?php

namespace Database\Seeders;

use App\Models\Holliday;
use Illuminate\Database\Seeder;

class HollidaysTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Holliday::factory()->times(25)->create();
    }
}
