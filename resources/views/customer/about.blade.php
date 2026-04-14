@extends('layouts.customer.app')

@section('content')
    <!-- About Start -->
    <div class="container-fluid py-2">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <h1 class="section-title position-relative text-center mb-5 caveat-heading">Selamat Datang di Tiga Dara Snack!
                    </h1>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 py-5">
                    <h2 class="font-weight-bold mb-3 caveat-heading caveat-heading">Tentang Kami</h2>
                    <h5 class="text-muted mb-3">Keripik Sayur & Buah Sejak 2010</h5>
                    <p>Kami hadir untuk Anda yang ingin menikmati camilan sehat dan lezat! Di sini,
                        kami menyediakan keripik sayur dan buah terbaik yang diolah dengan hati-hati,
                        tanpa bahan pengawet, dan kaya akan gizi. Rasakan kerenyahan alami dari setiap
                        gigitannya </p>
                    <p>Camilan yang tidak hanya enak, tapi juga menyehatkan!</p>
                    {{-- <a href="" class="btn btn-secondary mt-2">Learn More</a> --}}
                </div>
                <div class="col-lg-4" style="min-height: 400px;">
                    <div class="position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="assets/img/about1.jpg"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-5">
                    <h2 class="font-weight-bold mb-3 caveat-heading">Kenapa Memilih Kami?</h2>
                    <p>Renyah, Gurih, dan Penuh Nutrisi! Keripik sayur dan buah kami tidak hanya enak,
                        tapi juga kaya akan serat, vitamin, dan mineral yang tubuh Anda butuhkan.
                        Dengan tekstur yang renyah dan rasa yang menggoda, Anda bahkan tak akan merasa
                        seperti sedang makan sayur atau buah!</p>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>100% Bahan Alami</h5>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Pilihan Camilan Sehat
                    </h5>
                    <h5 class="text-muted mb-3"><i class="fa fa-check text-secondary mr-3"></i>Nikmati Gizi Tanpa
                        Kompromi</h5>
                    {{-- <a href="" class="btn btn-primary mt-2">Selengkapnya</a> --}}
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

    <!-- Team Start -->
    <div class="container-fluid py-3">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative mb-5 caveat-heading">Owner</h1>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="team-item">
                        <div class="team-img mx-auto">
                            <img class="rounded-circle w-100 h-100" src="assets/img/aish.jpg"
                                style="object-fit: cover;">
                        </div>
                        <div class="position-relative text-center bg-light rounded px-4 py-5"
                            style="margin-top: -100px;">
                            <h3 class="font-weight-bold mt-5 mb-3 pt-5">Nur'Aisyah Rahmadini</h3>
                            <h6 class="text-uppercase text-muted mb-4">Pemilik & Pendiri</h6>
                            <div class="col-12 mb-3">
                                <a class="btn btn-outline-secondary btn-social" href="https://wa.me/6285838546877"><i
                                        class="fab fa-whatsapp"></i></a>
                                <a class="btn btn-outline-secondary btn-social" href="https://instagram.com/tigadarasnack_"><i
                                        class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Team End -->
@endsection
