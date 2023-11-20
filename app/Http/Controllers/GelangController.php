<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GelangController extends Controller
{

    public function index()
    {
        $barang = DB::table('gelang')
            ->select('gelang.id', 'gelang.nama','gelang.harga', 'jenisbarang_id', 'jenisbarang.nama AS jenisbarang_nama')
            ->join('jenisbarang', 'jenisbarang.id', '=', 'gelang.jenisbarang_id')
            ->get();

        $jenisbarang = DB::table('jenisbarang')->get();

        return view('gelang.index', ['databarang' => $barang, 'jenisbarang' => $jenisbarang]);
    }


    public function create()
    {
        $jenisbarang = DB::table('jenisbarang')->get();
        return view('gelang.create', ['jenisbarang' => $jenisbarang]);
    }
    public function store(Request $request)
    {
        DB::table('gelang')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang
            
        ]);
  
        return redirect(url('/gelang'));
    }
    public function update(Request $request, $id)
    {
        DB::table('gelang')
        ->where('id', $id)
        ->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang,
          
        ]);

        return redirect(url('/gelang'));
    }

    public function edit($id)
    {
        $barang = DB::table('gelang')
        ->select("gelang.id","gelang.nama","gelang.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","gelang.jenisbarang_id")
        ->where("gelang.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('gelang.edit', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }

    public function show($id)
    {
        $barang = DB::table('gelang')
        ->select("gelang.id","gelang.nama","gelang.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","gelang.jenisbarang_id")
        ->where("gelang.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('gelang.show', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }
    public function destroy($id)
    {
        DB::table('gelang')
        ->where('id', $id)
        ->delete();

        return redirect(url('/gelang'));
    }
}
