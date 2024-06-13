@extends('front.layout.app')
@section('content')
    @foreach ($produk as $p)
        <section class="py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="row gx-4 gx-lg-5 align-items-center">
                    <div class="col-md-6">
                        @empty($p->foto)
                            <img class="card-img-top mb-5 mb-md-0" src="{{ url('admin/image/nophoto.jpg') }}" alt="project-image"
                                class="rounded">
                        @else
                            <img class="card-img-top mb-5 mb-md-0" src="{{ url('admin/image') }}/{{ $p->foto }}"
                                alt="project-image" class="rounded">
                        @endempty

                    </div>
                    <div class="col-md-6">
                        <div class="small mb-1">SKU: BST-498</div>
                        <h1 class="display-5 fw-bolder">{{ $p->nama }}</h1>
                        <div class="fs-5 mb-5">
                            <span class="text-decoration-line-through"></span>
                            <span>Rp. {{ $p->harga_jual }}</span>
                        </div>
                        <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium at dolorem
                            quidem
                            modi. Nam sequi consequatur obcaecati excepturi alias magni, accusamus eius blanditiis delectus
                            ipsam minima ea iste laborum vero?</p>
                        <div class="d-flex">
                            {{-- <input class="form-control text-center me-3" id="inputQuantity" type="num" value="1"
                                style="max-width: 3rem" /> --}}
                            @auth
                                <a class="btn btn-outline-dark flex-shrink-0" type="button"
                                    href="{{ route('add.to.cart', $p->id) }}">
                                    <i class="bi-cart-fill me-1"></i>
                                    Add to cart
                                </a>
                            @endauth

                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endforeach
@endsection
