<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Dokter;

class DokterController extends Controller
{
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
