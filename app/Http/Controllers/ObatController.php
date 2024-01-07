<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ObatController extends Controller
{
    public function index()
    {
    	$obat = DB::table('obat')->get();
 
    	return view('obat',['obat' => $obat]);
    }

    public function store(Request $request)
    {
        DB::table('obat')->insert([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);
        return redirect()->route('obat');
    
    }

    public function edit($id)
    {
        $obat = DB::table('obat')->where('id',$id)->get();
        return view('editobat',['obat' => $obat]);
    
    }

    public function update(Request $request)
    {
        DB::table('obat')->where('id',$request->id)->update([
            'nama_obat' => $request->nama_obat,
            'kemasan' => $request->kemasan,
            'harga' => $request->harga,
        ]);
        return redirect()->route('obat');
    }

    public function delete($id)
    {
        // menghapus data pegawai berdasarkan id yang dipilih
        DB::table('obat')->where('id',$id)->delete();
            
        // alihkan halaman ke halaman pegawai
        return redirect()->route('obat');
    }
}
