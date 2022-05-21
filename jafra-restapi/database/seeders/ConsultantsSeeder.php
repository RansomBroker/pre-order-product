<?php

namespace Database\Seeders;

use App\Models\Consultants;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class ConsultantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Consultants::factory()->count(10)->create();
    }
}
