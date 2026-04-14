@extends('layouts.customer.app')

@section('content')
    <div class="container py-5">
        <h1 class="section-title position-relative text-center mb-5 caveat-heading">Galeri</h1>
        <div class="row">
            @foreach($galeri as $item)
                <div class="col-md-4 mb-3">
                    <div class="card" style="border-radius: 15px; border: 2px solid #F195B2; overflow: hidden; transition: transform 0.3s ease;">
                        <img src="{{ asset('storage/galeri/' . $item->galeri) }}" class="card-img-top" alt="{{ $item->nama_produk }}" style="object-fit: cover; height: 250px;" data-toggle="modal" data-target="#modal{{ $item->id }}">
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="modal{{ $item->id }}" tabindex="-1" role="dialog" aria-labelledby="modalLabel{{ $item->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="modalLabel{{ $item->id }}">{{ $item->nama_produk }}</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img src="{{ asset('storage/galeri/' . $item->galeri) }}" class="img-fluid" alt="{{ $item->nama_produk }}">
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
