<!-- resources/views/layout/app.blade.php -->

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Your Laravel App</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .dropdown:hover .dropdown-menu {
            display: block;
        }

        .dropdown-menu {
            display: none;
            position: absolute;
            background-color: #05122d; /* Warna biru gelap yang lebih tua untuk latar belakang dropdown */
            border: none; /* Hapus border pada dropdown */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            z-index: 1000;
        }

        .dropdown-menu a {
            display: block;
            padding: 8px;
            text-decoration: none;
            color: #fff; /* Warna putih untuk teks dropdown */
        }

        .dropdown-menu a:hover {
            background-color: #ffffff; /* Warna biru yang lebih tua untuk latar belakang hover dropdown */
        }

        /* Style untuk header */
        header {
            background-color: #05122d; /* Warna biru gelap yang lebih tua untuk latar belakang header */
            color: #fff; /* Warna putih untuk teks header */
            display: flex;
            justify-content: space-between; /* Ratakan elemen ke kiri dan kanan */
            align-items: center; /* Atur elemen ke tengah vertikal */
            padding: 10px; /* Tambahkan padding agar tidak terlalu rapat ke tepi */
        }

        /* Ganti warna teks tombol menjadi putih */
        .btn-light {
            background-color: #fff;
            color: #ffffff; /* Warna teks hitam agar terlihat jelas di atas tombol putih */
            border: none; /* Hapus border pada tombol */
        }

        /* Ganti warna latar belakang tombol dropdown menjadi transparan */
        .btn-light.dropdown-toggle {
            background-color: transparent;
        }

        /* Ganti warna tombol dropdown menjadi putih */
        .btn-light.dropdown-toggle::after {
            color: #fff; /* Warna putih untuk ikon panah dropdown */
        }

        /* Hapus warna biru pada tombol Home */
        .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
            color: #fff;
            background-color: transparent; /* Hapus warna latar belakang biru pada tombol Home */
        }

        /* Ganti warna teks tombol Kontak Kami menjadi putih */
        .nav-pills .nav-link {
            color: #fff;
        }

        /* Ganti warna latar belakang tombol Produk menjadi putih saat dihover */
        .btn-light.dropdown-toggle:hover {
            background-color: #fff;
        }

        /* Ganti warna teks tombol search menjadi putih */
        .search-box {
            display: flex;
            align-items: center;
        }

        .search-box input[type="text"] {
            padding: 8px;
            border: none;
            border-radius: 4px;
            margin-right: 10px;
        }

        .search-box button {
            background-color: #fff;
            color: #05122d;
            padding: 8px;
            border: none;
            border-radius: 4px;
        }

        /* Ganti lebar dan tinggi logo sesuai kebutuhan */
        .logo img {
            width: 150px; /* Sesuaikan dengan lebar logo */
            height: auto; /* Sesuaikan dengan tinggi logo */
        }
    </style>
</head>
<body>

<header class="border-bottom">
    <!-- Logo -->
    <div class="logo">
        <img src="{{ asset('img/Gold_and_Silvers-removebg-preview.png') }}" alt="Logo">
    </div>

    <!-- Tombol Home, Produk, Kontak Kami -->
    <ul class="nav nav-pills">
        @php
            $menu = [['url' => '/', 'name' => 'Home']];
        @endphp

        @foreach ($menu as $m)
            @include('layout.nav-item', ['menu' => $m])
        @endforeach

        <!-- Tombol Dropdown Produk -->
        <div class="dropdown">
            <button class="btn btn-light dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Produk
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="anting">Anting</a>
                <a class="dropdown-item" href="kalung">Kalung</a>
                <a class="dropdown-item" href="gelang">Gelang</a>
                <a class="dropdown-item" href="cincin">Cincin</a>
            </div>
        </div>

        <!-- Tombol Kontak Kami -->
        @php
            $menu = [['url' => 'kontak', 'name' => 'Kontak Kami']];
        @endphp

        @foreach ($menu as $m)
            @include('layout.nav-item', ['menu' => $m])
        @endforeach
    </ul>

    <!-- Kolom Pencarian (Search) -->
    <div class="search-box">
        <input type="text" placeholder="Cari...">
        <button type="button">Cari</button>
    </div>
</header>

<!-- ... konten lainnya ... -->

<!-- Bootstrap JavaScript dan Popper.js (diperlukan untuk dropdown) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
