<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PoliController extends Controller
{
    public function index()
    {
    	$poli = DB::table('poli')->get();
 
    	return view('poli',['poli' => $poli]);
    }

    public function store(Request $request)
    {
        DB::table('poli')->insert([
            'nama' => $request->nama,
            'keterangan' => $request->keterangan,
        ]);
        return redirect()->route('poli');
    
    }
}
