<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $profiles = [
            [
                'nombre' => 'administrador'
            ],
            [
                'nombre' => 'artista'
            ]
        ];

        DB::table('perfiles')->insert($profiles);
    }
}
