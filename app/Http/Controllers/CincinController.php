<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CincinController extends Controller
{

    public function index()
    {
        $barang = DB::table('cincin')
            ->select('cincin.id', 'cincin.nama','cincin.harga', 'jenisbarang_id', 'jenisbarang.nama AS jenisbarang_nama')
            ->join('jenisbarang', 'jenisbarang.id', '=', 'cincin.jenisbarang_id')
            ->get();

        $jenisbarang = DB::table('jenisbarang')->get();

        return view('cincin.index', ['databarang' => $barang, 'jenisbarang' => $jenisbarang]);
    }


    public function create()
    {
        $jenisbarang = DB::table('jenisbarang')->get();
        return view('cincin.create', ['jenisbarang' => $jenisbarang]);
    }
    public function store(Request $request)
    {
        DB::table('cincin')->insert([
            'id' => $request->id,
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
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang,
          
        ]);

        return redirect(url('/cincin'));
    }

    public function edit($id)
    {
        $barang = DB::table('cincin')
        ->select("cincin.id","cincin.nama","cincin.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","cincin.jenisbarang_id")
        ->where("cincin.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('cincin.edit', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }

    public function show($id)
    {
        $barang = DB::table('cincin')
        ->select("cincin.id","cincin.nama","cincin.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","cincin.jenisbarang_id")
        ->where("cincin.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('cincin.show', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }
    public function destroy($id)
    {
        DB::table('cincin')
        ->where('id', $id)
        ->delete();

        return redirect(url('/cincin'));
    }
}
