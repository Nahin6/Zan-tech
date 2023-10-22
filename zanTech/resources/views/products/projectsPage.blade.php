@extends('dashboard.dashboard')

@section('content')

@if ($projects->isEmpty())
    <section class="py-5 mb-5" style="background: url(images/Banner/background-pattern.png);">
        <div class="container-fluid">
            <div class=" text-center">
                <h1 class="page-title pb-2 ">No Project</h1>
            </div>
            <h2 class="page-title pb-2 text-center">There is no project offer going on</h2>
        </div>
    </section>
@else
<section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bootstrap-tabs product-tabs">
                    <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                        <h3>All Projcets</h3>
                        @include('sweetalert::alert')
                        @if ($message = Session::get('success'))
                            <div id="success-message" class="alert alert-success">
                                <p>{{ $message }}</p>
                            </div>
                        @endif
                        <nav>
                        </nav>
                    </div>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel"
                            aria-labelledby="nav-all-tab">

                            <div
                                class="product-grid row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">

                                <!-- Card -->
                                @foreach ($projects as $products)
                                    <div class="col">
                                        <div class="product-item">
                                            <!-- Discount -->
                                            <!-- <span class="badge bg-success position-absolute m-3">-30%</span> -->
                                            <a href="{{ route('addProductToWishListNew', $products->id) }}"
                                                class="btn-wishlist">
                                                <svg width="24" height="24">
                                                    <use xlink:href="#heart"></use>
                                                </svg>

                                            </a>
                                            <figure>
                                                <a href="{{ route('viewProductDetails', $products->id) }}"
                                                    title="Product Title">
                                                    <img src="{{ asset('public/product_images/' . $products->productImg) }}"
                                                        alt="Product Thumbnail" class="tab-image product-image">
                                                </a>
                                            </figure>
                                            <h3>{{ $products->productName }}</h3>
                                            <!-- Stock count of product -->
                                            <span class="qty">{{ $products->productQuantity }} In stock</span>
                                            <span class="price">
                                                <i
                                                    class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $products->productPrice }}
                                            </span>
                                            <form action="{{ route('addToCart', $products->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <div class="d-flex align-items-center justify-content-between">
                                                    <input type="text" name="qty" hidden
                                                        class="form-control input-number quantity" value="1">
                                                    {{-- <input type="number" name="quantity" class="form-control input-number quantity" value="1" min="1" max="{{ $products->productQuantity }}"> --}}
                                                    @if ($products->productQuantity == 0)
                                                        <button disabled class="nav-link center-button">Out of stock
                                                            <i class="fa-regular fa-hourglass"></i>
                                                        </button>
                                                    @else
                                                        <button class="nav-link center-button">Add to Cart
                                                            <svg width="18" height="18">
                                                                <use xlink:href="#cart"></use>
                                                            </svg>
                                                        </button>
                                                    @endif
                                            </form>

                                        </div>
                                    </div>
                            </div>
                            @endforeach
                        </div>
                        <!-- / product-grid -->

                    </div>

                </div>
            </div>

        </div>
    </div>
    </div>
</section>
@endif
@endsection
{{-- @include('dashboard.footer') --}}
