<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Periksa;
use App\Models\DetailPeriksa;
use App\Models\Obat;
use App\Models\DaftarPoli;
use Carbon\Carbon;
class PeriksaController extends Controller
{
    public function index()
    {
        $periksa = Periksa::get();
        $daftarPoli = DaftarPoli::get();
 
    	return view('periksa',['periksa' => $periksa, 'daftarPoli'=>$daftarPoli]);
    }

    public function add($id){
        $daftarPoli = DaftarPoli::find($id);
        $obat = Obat::get();
 
    	return view('addperiksa',['obat' => $obat, 'daftarPoli' => $daftarPoli]);
    }

    public function store(Request $request)
    {
        $mytime = Carbon::now();
        $data= new Periksa;
        $data->id_daftar_poli = $request->id_daftar_poli;
        $data->tgl_periksa = $mytime;
        $data->catatan = $request->catatan;
        $data->biaya_periksa = 0; 
        $data->save();
        
        $obats = $request->input('obat');
        $biaya =0;
        foreach($obats as $o){
            $obat = Obat::find($o);
            $biaya += $obat->harga;
            DB::table('detail_periksa')->insert([
                'id_periksa' => $data->id,
                'id_obat' => $o
            ]);
        }
        $data->biaya_periksa = 150000+$biaya;
        $data->save();
        
        return redirect()->route('periksa');
    
    }
}
