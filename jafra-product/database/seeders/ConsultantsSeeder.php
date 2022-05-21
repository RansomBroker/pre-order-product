<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ConsultantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array([
            'consultant_unique_id' => "Ae3#5e",
            'consultant_name' => 'Dummy',
            'consultant_username' => 'dummy',
            'consultant_email' => "dummy@mail.com"
        ]);

        DB::table('consultants')->insertOrIgnore($data);
    }
}
