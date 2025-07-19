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
            'latitude' => -6.168625984526752,
            'longitude' => 106.83505160702235,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"PRINTIS KEMERDEKAAN",
            'latitude' => -6.171682001054781,
            'longitude' =>  106.88879620177613,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"SUNTER",
            'latitude' => -6.137917837853794,
            'longitude' => 106.86991650299925,
        ]);
          DB::table('halte')->insert([
            'nama_halte' =>"KEMAYORAN",
            'latitude' => -6.158358504431031,
            'longitude' => 106.85150316320698,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"TMII",
            'latitude' => -6.294647848905954,
            'longitude' =>  106.8812105214667,
        ]);
         DB::table('halte')->insert([
            'nama_halte' =>"GANDARIA",
            'latitude' => -6.243885193331962,
            'longitude' =>  106.78242218163417,
        ]);
          DB::table('halte')->insert([
            'nama_halte' =>"PLUMPANG",
            'latitude' => -6.128351895082124,
            'longitude' => 106.893760402902,
        ]);
          DB::table('halte')->insert([
            'nama_halte' =>"TB. PASAR MINGGU",
            'latitude' => -6.293844758738023,
            'longitude' => 106.82147247089564,
        ]);

          DB::table('halte')->insert([
            'nama_halte' =>"RANCO",
            'latitude' => -6.304446347859174,
            'longitude' =>  106.84863327265319,
        ]);

          DB::table('halte')->insert([
            'nama_halte' =>"LT. AGUNG",
            'latitude' => -6.308056266121144,
            'longitude' => 106.83809532812371,
        ]);

          DB::table('halte')->insert([
            'nama_halte' =>"UI",
            'latitude' => -6.352788016939004,
            'longitude' => 106.83325851983403,
        ]);
    }

}
