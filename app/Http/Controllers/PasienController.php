<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\JadwalPeriksa;
use App\Models\Pasien;
use App\Models\DaftarPoli;

class PasienController extends Controller
{
    public function index()
    {
        $pasien = Pasien::get();
 
    	return view('pasien',['pasien' => $pasien]);
    }

    public function daftarpasien(Request $request)
    {
        $lastPasien = DB::table('pasien')->latest('created_at')->first();

        if ($lastPasien) {
            $lastNumber = (int) substr($lastPasien->no_rm, -3);
            $nextNumber = $lastNumber + 1;
        } else {
            $nextNumber = 1;
        }

        // Format nomor Rekam Medis
        $rm = now()->format('Ym') . '-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT);

        DB::table('pasien')->insert([
            'name' => $request->nama,
            'alamat' => $request->alamat,
            'no_ktp' => $request->no_ktp,
            'no_hp' => $request->no_hp,
            'no_rm' => $rm,
            'created_at' => now()
        ]);
        return redirect()->route('pasien');
    
    }


    public function tambahdaftarpoli($id){
        $pasien = Pasien::find($id);
        $jadwal = JadwalPeriksa::get();

    	return view('tambahdaftarpoli',[
            'pasien' => $pasien,
            'jadwal_periksa'=>$jadwal
        ]);
    }

    public function storedaftarpoli(Request $request)
    {
        $lastPasien = DaftarPoli::get();

        $nextNumber = $lastPasien->count()+1;

        // Format nomor Rekam Medis
        $antri = $nextNumber;

        DB::table('daftar_poli')->insert([
            'id_pasien' => $request->id_pasien,
            'id_jadwal' => $request->id_jadwal,
            'keluhan' => $request->keluhan,
            'no_antrian' => $antri,
        ]);
        return redirect()->route('pasien');
    
    }
}
