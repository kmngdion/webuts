<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KalungController extends Controller
{

    public function index()
    {
        $barang = DB::table('kalung')
            ->select('kalung.id', 'kalung.nama','kalung.harga', 'jenisbarang_id', 'jenisbarang.nama AS jenisbarang_nama')
            ->join('jenisbarang', 'jenisbarang.id', '=', 'kalung.jenisbarang_id')
            ->get();

        $jenisbarang = DB::table('jenisbarang')->get();

        return view('kalung.index', ['databarang' => $barang, 'jenisbarang' => $jenisbarang]);
    }


    public function create()
    {
        $jenisbarang = DB::table('jenisbarang')->get();
        return view('kalung.create', ['jenisbarang' => $jenisbarang]);
    }
    public function store(Request $request)
    {
        DB::table('kalung')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang
            
        ]);
  
        return redirect(url('/kalung'));
    }
    public function update(Request $request, $id)
    {
        DB::table('kalung')
        ->where('id', $id)
        ->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang,
          
        ]);

        return redirect(url('/kalung'));
    }

    public function edit($id)
    {
        $barang = DB::table('kalung')
        ->select("kalung.id","kalung.nama","kalung.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","kalung.jenisbarang_id")
        ->where("kalung.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('kalung.edit', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }

    public function show($id)
    {
        $barang = DB::table('kalung')
        ->select("kalung.id","kalung.nama","kalung.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","kalung.jenisbarang_id")
        ->where("kalung.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('kalung.show', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }
    public function destroy($id)
    {
        DB::table('kalung')
        ->where('id', $id)
        ->delete();

        return redirect(url('/kalung'));
    }
}
