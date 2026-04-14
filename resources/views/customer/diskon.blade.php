@extends('layouts.customer.app')

@section('content')
    <div class="container py-5">
        <h1 class="section-title position-relative text-center mb-5 caveat-heading">Produk Diskon</h1>
        <div class="row">
            @foreach($produk as $item)
                <div class="col-md-4 mb-3">
                    <div class="card" style="border-radius: 15px; border: 2px solid #F195B2; overflow: hidden; transition: transform 0.3s ease;">
                        <img src="{{ asset('storage/produk/' . $item->foto_produk) }}" class="card-img-top" alt="{{ $item->nama_produk }}" style="object-fit: cover; height: 250px;">
                        <div class="card-body text-center">
                            <h5 class="card-title font-weight-bold">{{ $item->nama_produk }}</h5>
                            <p class="card-text text-muted">Harga: Rp {{($item->harga_produk) }}</p>
                            <a href="https://wa.me/6285838546877" class="btn btn-secondary py-2 px-4 mt-2" style="font-size: 14px;">Pesan Sekarang</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-4">
            {{ $produk->links('pagination::bootstrap-5') }}
        </div>
    </div>
@endsection
