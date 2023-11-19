@extends('layout.master')

@section('title', 'barang')

@section('breadcrumb')
    <li class="breadcrumb-item active">barang</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">Tabel Data barang</h4>
                </div>
                <div class="col-2">
                    <a class="btn btn-sm btn-primary float-end" href="{{ url('/barang/create') }}">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Harga</th>
                       
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($databarang as $db)
                        <tr>
                            <td>{{ $db->idbarang }}</td>
                            <td>{{ $db->nama }}</td>
                            <td>{{ $db->harga }}</td>
                            <td>{{ $db->jenisbarang_nama }}</td>
                            <td class="float-end">
                                <a class="btn btn-sm btn-warning"
                                    href="{{ url('/barang/' . $db->id . '/edit') }}">Ubah</a>
                                    <a class="btn btn-sm btn-info"
                                    href="{{ url('/barang/' . $db->id) }}">View</a>
                                    <form style="display: inline;"action="{{ url('/barang/' . $db->id ) }}" method = "POST">
                                    @csrf
                                    @method('DELETE')
                                <button class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
