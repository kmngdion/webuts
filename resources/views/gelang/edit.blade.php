@extends('layout.master')

@section('title', 'Ubah Data Gelang')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/gelang') }}">Gelang</a></li>
    <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Ubah Data Gelang</h4>
            </div>
        </div>
        <form action="{{ url('/gelang/' . $id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="mb-3">
                    <label for="id" class="form-label">ID</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $databarang->id }}">
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $databarang->nama }}">
                </div>
                <div class="mb-3">
                    <label for="harga" class="form-label">Harga</label>
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $databarang->harga }}">
                </div>
                <div class="mb-3">
                    <label for="jenisbarang" class="form-label">Jenis Barang</label>
                    <select class="form-select" id="jenisbarang" name="jenisbarang">
                        @foreach ($jenisbarang as $j)
                            <option value="{{ $j->id }}" {{ $j->id == $databarang->jenisbarang_id ? 'selected' : '' }}>
                                {{ $j->nama }}
                            </option>
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
