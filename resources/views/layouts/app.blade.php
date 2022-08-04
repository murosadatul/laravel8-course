<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Muro Sadatul Mahmud">
        <title>Portal Berita - Laravel 8</title>
        <!-- Bootstrap core CSS -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        @stack('css');

    </head>
<body>
    {{-- include adalah blade helper digunakan untuk memanggil atau mengkutip kode program dari file lain
        include hanya menerima satu parameter, yaitu lokasi dari file yang akan dipanggil.  --}}
    @include('layouts.header')
    <main class="container">
        @include('layouts.main')
        <div class="row g-5">
            {{-- yield adalah blade helper digunakan untuk menyediakan bagian tertentu yang akan diisi oleh kode program dari file lain,
                 pada portal berita ini saya membuat yield untuk halaman atau file content --}}
            @yield('content')
            @include('layouts.sidebar')
        </div>
    </main>
    @include('layouts.login');
    @include('layouts.footer')
</body>
</html>
