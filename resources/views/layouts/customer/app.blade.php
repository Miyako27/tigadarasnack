<!DOCTYPE html>
<html lang="en">

<meta charset="utf-8">
<title>Tiga Dara Snack</title>
<meta content="width=device-width, initial-scale=1.0" name="viewport">
<meta content="Free HTML Templates" name="keywords">
<meta content="Free HTML Templates" name="description">

<!-- Favicon -->
<link href="assets/img/favicon.ico" rel="icon">

<!-- Google Web Fonts -->
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

<!-- Google Web Fonts Caveat -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Caveat:wght@400..700&display=swap" rel="stylesheet">

<!-- File CSS Anda -->
<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

<!-- Libraries Stylesheet -->
<link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
<link href="assets/lib/lightbox/css/lightbox.min.css" rel="stylesheet">

<!-- Other head content -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- JS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">


    {{-- start css --}}
    @include('layouts.customer.css')
    {{-- end CSS --}}

</head>

<body>

    <main class="content">
        {{-- start header --}}
        @include('layouts.customer.header')
        {{-- end header --}}

        {{-- start main content --}}
        @yield('content')
        {{-- end main content --}}

        {{-- start footer --}}
        @include('layouts.customer.footer')
        {{-- ent footer --}}

        {{-- start footer --}}
        @include('layouts.customer.backtotop')
        {{-- ent footer --}}

    </main>

    {{-- start js --}}
    @include('layouts.customer.js')
    {{-- end js --}}
</body>

</html>
