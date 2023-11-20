<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntingController extends Controller
{

    public function index()
    {
        $barang = DB::table('anting')
            ->select('anting.id', 'anting.nama','anting.harga', 'jenisbarang_id', 'jenisbarang.nama AS jenisbarang_nama')
            ->join('jenisbarang', 'jenisbarang.id', '=', 'anting.jenisbarang_id')
            ->get();

        $jenisbarang = DB::table('jenisbarang')->get();

        return view('anting.index', ['databarang' => $barang, 'jenisbarang' => $jenisbarang]);
    }


    public function create()
    {
        $jenisbarang = DB::table('jenisbarang')->get();
        return view('anting.create', ['jenisbarang' => $jenisbarang]);
    }
    public function store(Request $request)
    {
        DB::table('anting')->insert([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang
            
        ]);
  
        return redirect(url('/anting'));
    }
    public function update(Request $request, $id)
    {
        DB::table('anting')
        ->where('id', $id)
        ->update([
            'id' => $request->id,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'jenisbarang_id' => $request->jenisbarang,
          
        ]);

        return redirect(url('/anting'));
    }

    public function edit($id)
    {
        $barang = DB::table('anting')
        ->select("anting.id","anting.nama","anting.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","anting.jenisbarang_id")
        ->where("anting.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('anting.edit', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }

    public function show($id)
    {
        $barang = DB::table('anting')
        ->select("anting.id","anting.nama","anting.harga","jenisbarang_id","jenisbarang.nama AS jenisbarang_nama")
        ->join("jenisbarang","jenisbarang.id","=","anting.jenisbarang_id")
        ->where("anting.id",$id)
        ->first();
        $jenisbarang = DB::table('jenisbarang')->get();

        return view('anting.show', ['databarang' => $barang, 'id' => $id, 'jenisbarang' => $jenisbarang]);
    }
    public function destroy($id)
    {
        DB::table('anting')
        ->where('id', $id)
        ->delete();

        return redirect(url('/anting'));
    }
}
