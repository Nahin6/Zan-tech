{{-- @include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar') --}}

@extends('dashboard.dashboard')

@section('content')
    @if ($products->isEmpty())
        <div class="shopify-grid">
            <div class="container-fluid">
                <div class="row g-5">
                    <aside class="col-md-2">
                        <div class="sidebar">
                            <div class="widget-menu">
                            </div>
                            <div class="widget-product-categories pt-5">
                                <h5 class="widget-title">Categories</h5>
                                <ul class="product-categories sidebar-list list-unstyled">
                                    @foreach ($categories as $category)
                                        <li class="cat-item">
                                            <a href="{{ route('filterCategories', ['category' => $category->catagoryName]) }}"
                                                class="nav-link">{{ $category->catagoryName }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget-price-filter pt-3">
                                <h5 class="widget-titlewidget-title">Filter By Price</h5>
                                <ul class="product-tags sidebar-list list-unstyled">
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [0, 200]) }}"
                                            class="nav-link">0-200</a>

                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [201, 400]) }}"
                                            class="nav-link">200-400</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [401, 600]) }}"
                                            class="nav-link">400-600</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [601, 800]) }}"
                                            class="nav-link">600-800</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [801, 1000]) }}"
                                            class="nav-link">800-1000</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [1001, 1500]) }}"
                                            class="nav-link">1000-1500</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <main class="col-md-10">
                        <section class="py-5">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bootstrap-tabs product-tabs">
                                            <div class="tabs-header d-flex justify-content-between border-bottom my-5">
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


                                                    <h2 class="text-center">Product Not found</h2>
                                                </div>
                                                <!-- / product-grid -->

                                            </div>

                                        </div>
                                    </div>

                                </div>
                            </div>
                </div>
                </section>
                </main>
            </div>
        </div>
        </div>
    @else
        <div class="shopify-grid">
            <div class="container-fluid">
                <div class="row g-5">
                    <aside class="col-md-2">
                        <div class="sidebar">
                            <div class="widget-menu">
                            </div>
                            <div class="widget-product-categories pt-5">
                                <h5 class="widget-title">Categories</h5>
                                <ul class="product-categories sidebar-list list-unstyled">
                                    @foreach ($categories as $category)
                                        <li class="cat-item">
                                            <a href="{{ route('filterCategories', ['category' => $category->catagoryName]) }}"
                                                class="nav-link">{{ $category->catagoryName }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="widget-price-filter pt-3">
                                <h5 class="widget-titlewidget-title">Filter By Price</h5>
                                <ul class="product-tags sidebar-list list-unstyled">
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [0, 200]) }}"
                                            class="nav-link">0-200</a>

                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [201, 400]) }}"
                                            class="nav-link">200-400</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [401, 600]) }}"
                                            class="nav-link">400-600</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [601, 800]) }}"
                                            class="nav-link">600-800</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [801, 1000]) }}"
                                            class="nav-link">800-1000</a>
                                    </li>
                                    <li class="tags-item">
                                        <a href="{{ route('filterProductsByPriceRange', [1001, 1500]) }}"
                                            class="nav-link">801-1500</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                    <main class="col-md-10">
                        <section class="py-5">
                            <div class="container-fluid">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="bootstrap-tabs product-tabs">
                                            <div class="tabs-header d-flex justify-content-between border-bottom my-5">
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
                                                        @foreach ($products as $products)
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
                                                                                alt="Product Thumbnail"
                                                                                class="tab-image product-image">
                                                                        </a>
                                                                    </figure>
                                                                    <h3>{{ $products->productName }}</h3>
                                                                    <!-- Stock count of product -->
                                                                    <span class="qty">{{ $products->productQuantity }}
                                                                        In
                                                                        stock</span>
                                                                    <span class="price">
                                                                        <i
                                                                            class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $products->productPrice }}
                                                                    </span>
                                                                    <form action="{{ route('addToCart', $products->id) }}"
                                                                        method="POST" enctype="multipart/form-data">
                                                                        @csrf
                                                                        <div
                                                                            class="d-flex align-items-center justify-content-between">
                                                                            <input type="text" name="qty" hidden
                                                                                class="form-control input-number quantity"
                                                                                value="1">
                                                                            @if ($products->productQuantity == 0)
                                                                                <button disabled
                                                                                    class="nav-link center-button">Out of
                                                                                    stock
                                                                                    <i class="fa-regular fa-hourglass"></i>
                                                                                </button>
                                                                            @else
                                                                                <button class="nav-link center-button">Add
                                                                                    to Cart
                                                                                    <svg width="18" height="18">
                                                                                        <use xlink:href="#cart"></use>
                                                                                    </svg>
                                                                                </button>
                                                                            @endif
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
    </main>
    </div>
    </div>
    </div>



@endsection

{{-- @include('dashboard.footer') --}}
