@extends('layouts.customer.app')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 pb-5">
        <div id="header-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="assets/img/bg-1.png" alt="bg-1">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3 caveat-heading">Tak Suka Buah dan Sayur? Kami Punya Solusinya!
                            </h4>
                            <h1 class="display-3 text-white mb-md-4 caveat-heading">Keripik Sayur Buah Renyah & Bernutrisi!</h1>
                            <a href="{{ route('tentang') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="assets/img/bg-2.png" alt="bg-2">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h4 class="text-white text-uppercase mb-md-3 caveat-heading">Keripik Sayur dan Buah</h4>
                            <h1 class="display-3 text-white mb-md-4 caveat-heading">100% Terbuat dari Buah dan Sayur Segar</h1>
                            <a href="{{ route('tentang') }}" class="btn btn-primary py-md-3 px-md-5 mt-2">Selengkapnya</a>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n1"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-secondary px-0" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n1"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- Promotion Start -->
    <div class="container-fluid my-5 py-3 px-0">
        <div class="row bg-primary m-0">
            <div class="col-md-6 px-0" style="min-height: 500px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="assets/img/gambar2.jpg" style="object-fit: cover;">
                </div>
            </div>
            <div class="col-md-6 py-5 py-md-0 px-0">
                    <div class="h-100 d-flex flex-column align-items-center justify-content-center text-center p-5">
                        <div class="d-flex align-items-center justify-content-center bg-white rounded-circle mb-4"
                            style="width: 100px; height: 100px;">
                        <h3 class="font-weight-bold text-secondary mb-0">Rp 15.000</h3>
                        </div>
                    <h3 class="font-weight-bold text-white mt-3 mb-4">Keripik Sawi</h3>
                    <p class="text-white mb-4">Siapa sangka sawi bisa menjadi camilan favorit Anda?
                        Kami mengolah daun sawi segar menjadi keripik yang gurih, renyah,
                        dan kaya akan gizi. Ini adalah camilan sehat yang sempurna untuk Anda yang
                        ingin menikmati manfaat sawi dengan cara yang lebih menyenangkan!</p>
                    <a href="https://wa.me/6285838546877" class="btn btn-secondary py-3 px-5 mt-2">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>
    <!-- Promotion End -->

    <!-- Services Start -->
    <div class="container-fluid py-3">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative mb-5 caveat-heading">Produk Best Seller</h1>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <!-- Hapus owl-carousel dan ganti dengan static layout untuk 3 produk -->
                    <div class="row">
                        <!-- Produk 1 -->
                        @foreach($dataProduk as $item)
                        <div class="col-md-4 mb-4">
                            <div class="service-item">
                                <div class="service-img mx-auto">
                                    <img class="rounded-circle w-100 h-100 bg-light p-3" src="{{ asset('storage/produk/' . $item->foto_produk) }}"
                                        style="object-fit: cover;">
                                </div>
                                <div class="position-relative text-center bg-light rounded p-4 pb-5"
                                    style="margin-top: -75px;">
                                    <h5 class="font-weight-semi-bold mt-5 mb-3 pt-5">{{ $item->nama_produk }}</h5>
                                    <p>{{ $item->deskripsi_produk }}</p>
                                    <a href="https://wa.me/6285838546877"
                                        class="border-bottom border-secondary text-decoration-none text-secondary">Pesan
                                        Sekarang</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Services End -->

    <!-- Products Start -->
    <div class="container-fluid py-3">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative mb-5 caveat-heading">Produk</h1>
                </div>
                <div class="col-lg-6 mb-5 mb-lg-0 pb-5 pb-lg-0"></div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel product-carousel">
                        @foreach ($produk as $row)
                            <div
                                class="product-item d-flex flex-column align-items-center text-center bg-light rounded py-5 px-3">
                                <div class="bg-primary mt-n5 py-3" style="width: 80px;">
                                    <h4 class="font-weight-bold text-white mb-0">Rp {{ $row->harga_produk_rupiah }}</h4>
                                </div>
                                <div class="position-relative bg-primary rounded-circle mt-n3 mb-4 p-3"
                                    style="width: 150px; height: 150px;">
                                    <img class="rounded-circle w-100 h-100" src="{{ asset('storage/produk/' . $row->foto_produk) }}"
                                        style="object-fit: cover;">
                                </div>
                                <h5 class="font-weight-bold mb-4">{{ $row->nama_produk }}</h5>
                                <a href="https://wa.me/6285838546877" class="btn btn-sm btn-secondary">Pesan Sekarang</a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- Teks Lihat Selengkapnya -->
            <div class="row">
                <div class="col-12 text-right mt-4">
                    <a href="{{ route('product') }}" class="text-primary font-weight-bold">
                        Lihat Selengkapnya <i class="fas fa-arrow-right" style="font-weight: bold;"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Products End -->

    <!-- Testimonial Start -->
    <div class="container-fluid py-3">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <h1 class="section-title position-relative text-center mb-5 caveat-heading">Ulasan</h1>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="owl-carousel testimonial-carousel">
                        @foreach ($dataUlasan as $row)
                            <div class="text-center">
                                <i class="fa fa-3x fa-quote-left text-primary mb-4"></i>
                                <h4 class="font-weight-light mb-4">{{ $row->ulasan }}</h4>
                                {{-- <img class="img-fluid mx-auto mb-3" src="assets/img/ana.jpg" alt=""> --}}
                                <h5 class="font-weight-bold m-0">{{ $row->nama_ulasan }}</h5>
                                <span>{{ $row->keterangan_ulasan }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
