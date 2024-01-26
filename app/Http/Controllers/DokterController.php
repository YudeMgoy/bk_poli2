<?php

namespace App\Http\Controllers;
use App\Models\JadwalPeriksa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;

class DokterController extends Controller
{
    public function Login(Request $request){
        $dokter = Dokter::where("nama", $request->nama)->where("no_hp", $request->no_hp)->first();
        if($dokter == null) return redirect()->route('dokterloginform');
        $jadwal = JadwalPeriksa::where("id_dokter",$dokter->id)->get();
 
    	return view('jadwalperiksa',['jadwal' => $jadwal, "dokter"=>$dokter]);
    }
    public function index()
    {
    	$dokter = Dokter::get();
 
    	return view('dokter',['dokter' => $dokter]);
    }

    public function tambahdokter(){
        $poli = DB::table('poli')->get();
 
    	return view('tambahdokter',['poli' => $poli]);
    }

    public function store(Request $request)
    {
        DB::table('dokter')->insert([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'id_poli' => $request->id_poli,
        ]);
        return redirect()->route('dokter');
    
    }
}
