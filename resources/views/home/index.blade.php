@extends('layout.master')

@section('title', 'Home')

@section('breadcrumb')
    <li class="breadcrumb-item active">Home</li>
@endsection

@section('content')
    <div style="text-align: center;">
        <h2>Selamat Datang di Gold and Silvers</h2>
    </div>

    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('img/Anting1.jpeg') }}" class="d-block mx-auto" style="max-width: 50%;" alt="Anting 1">
                <div class="carousel-caption d-none"></div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/Kalung1.jpg') }}" class="d-block mx-auto" style="max-width: 50%;" alt="Kalung 1">
                <div class="carousel-caption d-none"></div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/Gelang1.jpg') }}" class="d-block mx-auto" style="max-width: 50%;" alt="Gelang 1">
                <div class="carousel-caption d-none"></div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('img/Cincin1.jpg') }}" class="d-block mx-auto" style="max-width: 50%;" alt="Cincin 1">
                <div class="carousel-caption d-none"></div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JavaScript dan jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Script untuk menginisialisasi karusel
        $(document).ready(function(){
            setInterval(function(){
                $('#carouselExampleIndicators').carousel('next');
            }, 2000); // Ubah nilai menjadi 2000 (2 detik)
        });
    </script>
    
@endsection
