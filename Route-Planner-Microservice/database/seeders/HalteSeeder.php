<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class HalteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         DB::table('halte')->insert([
            'nama_halte' =>"LAPANGAN BANTENG",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"PRINTIS KEMERDEKAAN",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"SUNTER",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
          DB::table('halte')->insert([
            'nama_halte' =>"KEMAYORAN",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"TMII",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"GANDARIA",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
          DB::table('halte')->insert([
            'nama_halte' =>"PLUMPANG",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
          DB::table('halte')->insert([
            'nama_halte' =>"TB. PASAR MINGGU",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);

          DB::table('halte')->insert([
            'nama_halte' =>"RANCO",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);

          DB::table('halte')->insert([
            'nama_halte' =>"LT. AGUNG",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);

          DB::table('halte')->insert([
            'nama_halte' =>"UI",
            'latitude' => NULL,
            'longitude' => NULL,
        ]);
    }

}
