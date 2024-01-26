<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JadwalPeriksa;
use App\Models\Dokter;

class JadwalController extends Controller
{
    public function index()
    {
    	$jadwal = JadwalPeriksa::get();
 
    	return view('jadwalperiksa',['jadwal' => $jadwal]);
    }

    public function tambah($id){
    	return view('tambahjadwalperiksa', ["id"=>$id]);
    }

    public function store(Request $request)
    {                
        DB::table('jadwal_periksa')->insert([
            'hari' => $request->hari,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'id_dokter' => $request->id_dokter,
            'aktif' => 0
            ]);

        $dokter = Dokter::find($request->id_dokter);
        if($dokter == null) return redirect()->route('dokterloginform');
        $jadwal = JadwalPeriksa::where("id_dokter",$request->id_dokter)->get();
        return view('jadwalperiksa',['jadwal' => $jadwal, "dokter"=>$dokter]);
    }

    public function aktifkan($id){
        $jadwals = JadwalPeriksa::get();
        foreach($jadwals as $j){
            $j->aktif = 0;
            $j->save();
        }
        $jadwal = JadwalPeriksa::find($id);
        $jadwal->aktif = 1;
        $jadwal->save();

        $dokter = Dokter::find($jadwal->id_dokter);
        if($dokter == null) return redirect()->route('dokterloginform');
        $jadwal = JadwalPeriksa::where("id_dokter",$dokter->id)->get();
        return view('jadwalperiksa',['jadwal' => $jadwal, "dokter"=>$dokter]);
    }
}
