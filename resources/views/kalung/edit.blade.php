@extends('layout.master')

@section('title', 'Ubah barang')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{ url('/barang') }}">barang</a></li>
    <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <h4 class="card-title">Form Ubah barang</h4>
            </div>
        </div>
        <form action="{{ url('/barang/' . $id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div>
                    <label class="form-label">ID</label>
                    <input class="form-control" type="text" name="idbarang" value="{{ $databarang->idbarang}}">
                </div>
                <div>
                    <label class="form-label">Nama</label>
                    <input class="form-control" type="text" name="nama" value="{{ $databarang->nama }}">
                </div>
                <div>
                    <label class="form-label">Harga</label>
                    <input class="form-control" type="text" name="harga" value="{{ $databarang->harga }}">
                </div>
                <div>
                    <label class="form-label">Jenis Barang</label>
                    <select class="form-select" name="jenisbarang">
                        @foreach ($jenisbarang as $j)
                            <option value="{{ $j->id }}">{{ $j->nama }}</option>
                        @endforeach
                    </select>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
@endsection