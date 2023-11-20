@extends('layout.master')

@section('title', 'Tambah Cincin')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/cincin') }}">Cincin</a></li>
    <li class="breadcrumb-item active">Tambah Cincin</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Tambah Cincin</h4>
            </div>
        </div>
        <form action="{{ url('/cincin') }}" method="POST">
            <div class="card-body">
                @csrf
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga">
                </div>
                <div class="mb-3">
                    <label for="jenisbarang" class="form-label">Jenis Bahan</label>
                    <select class="form-select" id="jenisbarang" name="jenisbarang">
                        @foreach ($jenisbarang as $j)
                            <option value="{{ $j->id }}">{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn" style="background-color: #05122d; color: #fff;">Simpan</button>
            </div>
        </form>
    </div>

    <style>
        /* Gaya tambahan di sini */
        .btn {
            padding: 8px 16px; /* Sesuaikan dengan padding yang diinginkan */
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        /* Gaya untuk tombol dengan latar belakang biru gelap dan teks putih */
        .btn-primary {
            background-color: #05122d;
            color: #fff;
        }
    </style>
@endsection
