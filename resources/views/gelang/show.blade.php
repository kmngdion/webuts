@extends('layout.master')

@section('title', 'Details Gelang')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/gelang') }}">Gelang</a></li>
    <li class="breadcrumb-item active">Details Gelang</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="card-header">Details Gelang</div>
            <div class="card-body">
                <div class="card-body">
                    <p class="card-text">ID  :{{ $databarang->id }}</p>
                    <p class="card-text">Nama : {{ $databarang->nama }}</p>
                    <p class="card-text">Harga : {{ $databarang->harga }}</p>
                    <p class="card-text">Jenis Bahan : {{ $databarang->jenisbarang_nama }}</p>
                    <a class="btn btn-sm btn-info" href="{{ url('/gelang/') }}">Back</a>
                </div>
            </div>
        </div>
    </div>

    <style>
        .btn {
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Gaya untuk tombol dengan latar belakang biru gelap dan teks putih */
        .btn-info {
            background-color: #05122d;
            color: #fff;
        }
    </style>
@endsection
