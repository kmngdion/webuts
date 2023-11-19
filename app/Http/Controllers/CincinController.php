<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CincinController extends Controller
{

    public function index()
    {
        $barang = DB::table('cincin')
        ->select("barang.id","idbarang","barang.nama", "barang.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","barang.jenisbarang_id")
        ->get();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('barang.index', ['databarang' => $barang]);

    }

    public function create()
    {
        $jenisbarang = DB::table('jenisbarang')->get();
        return view('barang.create', ['jenisbarang' => $jenisbarang]);
    }
    public function store(Request $request)
    {
        DB::table('cincin')->insert([
            'idbarang' => $request->idbarang,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang
            
        ]);
  
        return redirect(url('/cincin'));
    }
    public function update(Request $request, $id)
    {
        DB::table('cincin')
        ->where('id', $id)
        ->update([
            'idbarang' => $request->idbarang,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang,
          
        ]);

        return redirect(url('/cincin'));
    }

    public function edit($id)
    {
        $barang = DB::table('cincin')
        ->select("barang.id","idbarang","barang.nama","barang.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","barang.jenisbarang_id")
        ->where("barang.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('barang.edit', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }

    public function show($id)
    {
        $barang = DB::table('cincin')
        ->select("barang.id","idbarang","barang.nama","barang.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","barang.jenisbarang_id")
        ->where("barang.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('barang.show', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }
    public function destroy($id)
    {
        DB::table('cincin')
        ->where('id', $id)
        ->delete();

        return redirect(url('/cincin'));
    }
}
