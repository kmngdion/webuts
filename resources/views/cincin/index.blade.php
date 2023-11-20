@extends('layout.master')

@section('title', 'Cincin')

@section('breadcrumb')
    <li class="breadcrumb-item active">Cincin</li>
@endsection

@section('content')
    <style>
        .btn-custom {
            background-color: #05122d; /* Warna biru gelap */
            color: #fff; /* Warna teks putih */
        }

        .btn-custom:hover {
            background-color: #ffffff; /* Warna putih saat tombol dihover */
            color: #05122d; /* Warna teks biru gelap saat tombol dihover */
        }
    </style>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-10">
                    <h4 class="card-title">List Cincin</h4>
                </div>
                <div class="col-2">
                    <a class="btn btn-sm btn-custom float-end" href="{{ url('/cincin/create') }}">Tambah</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-center">ID</th>
                            <th scope="col" class="text-center">Nama</th>
                            <th scope="col" class="text-center">Harga</th>
                            <th scope="col" class="text-center">Bahan</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($databarang as $db)
                            <tr>
                                <td>{{ $db->id }}</td>
                                <td>{{ $db->nama }}</td>
                                <td>Rp {{ number_format($db->harga, 0, ',', '.') }}</td>
                                <td>{{ $db->jenisbarang_nama }}</td>
                                <td class="text-center">
                                    <a class="btn btn-sm btn-custom" href="{{ url('/cincin/' . $db->id . '/edit') }}">Ubah</a>
                                    <a class="btn btn-sm btn-custom" href="{{ url('/cincin/' . $db->id) }}">View</a>
                                    <form style="display: inline;" action="{{ url('/cincin/' . $db->id ) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-custom">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
