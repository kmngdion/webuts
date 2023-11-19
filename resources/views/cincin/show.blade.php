@extends('layout.master')

@section('title', 'Ubah barang')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/barang') }}">barang</a></li>
    <li class="breadcrumb-item active">Show</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-header">Show</div>
            <div class="card-body">
                  <div class="card-body">
                  <p class="card-text">ID barang :{{ $databarang->idbarang }}</p>
                  <p class="card-text">Nama : {{ $databarang->nama }}</p>
                  <p class="card-text">Harga : {{ $databarang->harga }}</p>
                  <p class="card-text">Jenis Barang : {{ $databarang->jenisbarang_nama }}</p>
                  <a class="btn btn-sm btn-info" href="{{ url('/barang/') }}">Back</a>
              
            </div>
          </div>
@endsection

