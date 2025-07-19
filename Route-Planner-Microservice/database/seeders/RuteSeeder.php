<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('rute')->insert([
            'nama_rute'            => "Rute 1",
            'halte_id_asal'        => 1,
            'halte_id_transit'     => null,
            'halte_id_tujuan'      => 2,

            'jarak_tempuh'         => null,
            'jumlah_armada'        => 4,
        ]);
        DB::table('rute')->insert([
            'nama_rute'            => "Rute 2",
            'halte_id_asal'        => 7,
            'halte_id_transit'     => 3,
            'halte_id_tujuan'      => 4,

            'jarak_tempuh'         => null,
            'jumlah_armada'        => 4,
        ]);
        DB::table('rute')->insert([
            'nama_rute'            => "Rute 3",
            'halte_id_asal'        => 5,
            'halte_id_transit'     => null,
            'halte_id_tujuan'      => 6,

            'jarak_tempuh'         => null,
            'jumlah_armada'        => 4,
        ]);
        DB::table('rute')->insert([
            'nama_rute'            => "Rute 7",
            'halte_id_asal'        => 5,
            'halte_id_transit'     => "9,10",

            'halte_id_tujuan'      => 6,
            'jarak_tempuh'         => null,
            'jumlah_armada'        => 4,
        ]);
    }
}
