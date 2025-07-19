<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Halte;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $awal            = $request->input('awal');
        $akhir           = $request->input('akhir');
        $query           = DB::table('rute')->where('halte_id_asal', $awal)->where('halte_id_tujuan', $akhir)->get();
        $lokasi_awal     = "";
        $lokasi_tujuan   = "";
        $bus_stop        = [];
        $koordinat_stop  = [];
        $koordinat_awal  = [];
        $koordinat_akhir = [];

        // dd($query);
        if (count($query) > 0) {

            foreach ($query as $data) {
                $lokasi_awal   = Halte::find($data->halte_id_asal);
                $lokasi_tujuan = Halte::find($data->halte_id_tujuan);
                if ($data->halte_id_transit != "") {
                    $cek_karakter_khusus = "/[^a-zA-Z0-9\s]/";
                    if (preg_match($cek_karakter_khusus, $data->halte_id_transit)) {
                        $break_karakter = explode(",", $data->halte_id_transit);
                        // echo $break_karakter[0];
                        foreach ($break_karakter as $transit) {
                            $bus_stop = $transit;
                            // echo $bus_stop;
                            $halte_stop       = Halte::find($bus_stop);
                            $koordinat_stop[] = [
                                "nama_halte" => $halte_stop->nama_halte,
                                "latitude"   => $halte_stop->latitude,
                                "longitude"  => $halte_stop->longitude,

                            ];
                            // echo $koordinat_stop;
                            }
                    }
                }
            }
            $koordinat_awal = [
                "nama_halte" => $lokasi_awal->nama_halte,
                "latitude"   => $lokasi_awal->latitude,
                "longitude"  => $lokasi_awal->longitude,

            ];
            $koordinat_akhir = [
                "nama_halte" => $lokasi_tujuan->nama_halte,
                "latitude"   => $lokasi_tujuan->latitude,
                "longitude"  => $lokasi_tujuan->longitude,

            ];
            return response()->json([
                'koordinat_awal'  => $koordinat_awal,
                'koordinat_akhir' => $koordinat_akhir,
                'koordinat_stop'  => $koordinat_stop,
                'status' => 1
            ]);
        } else {
            return response()->json(
                [
                    'status' =>0,
                    'pesan' =>'  Rute Tidak Ditemukan'
                ]
              );
        }
        // $query = DB::table('rute')->get();
        // return $this->Djikstra($rute, $awal);
// return response()->json(['awal'=>$awal]);

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

//     private function Djikstra($graf, $awal)
//     {
//         $rute          = [];
//         $posisi        = $graf;
//         $posisi[$awal] = 0;
//         foreach ($rute as $graf) {
//             $jarak[$rute->halte_id_asal]           = INF;
//             $titikSebelumnya[$rute->halte_id_asal] = null;

//         }
//         $rute[$awal]                           = 0;
//         $queue = $graf;
//  // Loop utama
//   while($queue) {

//     $rute_dekat = ($queue->jarak_tempuh;
//     // Ambil simpul dengan jarak terpendek dari antrian
//     // u := simpul terpendek(antrian, jarak)

//     // Hapus simpul dari antrian
//     // hapus(antrian, u)

//     // Perbarui jarak ke simpul tetangga
//     untuk setiap simpul v yang bertetangga dengan u:
//       jika jarak[v] > jarak[u] + jarak(u, v):
//         jarak[v] := jarak[u] + jarak(u, v)
//         previous[v] := u

//   // Kembalikan hasil
//   return jarak[], previous[]
//         //   $jarak =

//     }
}
