@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')



{{-- <section class="py-5 mb-5" style="background: url(images/Banner/background-pattern.png);">
    <div class="container-fluid">
        <div class=" text-center">
            <h1 class="page-title pb-2 ">Shop</h1>
        </div>
        <h2 class="page-title pb-2 text-center">Find your desire product</h2>
    </div>
</section> --}}

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
                            <li class="cat-item">
                                <a href="/collections/categories">All</a>
                            </li>
                            <li class="cat-item">
                                <a href="#" class="nav-link">Phones</a>
                            </li>
                            <li class="cat-item">
                                <a href="#" class="nav-link">Accessories</a>
                            </li>
                            <li class="cat-item">
                                <a href="#" class="nav-link">Tablets</a>
                            </li>
                            <li class="cat-item">
                                <a href="#" class="nav-link">Watches</a>
                            </li>
                        </ul>
                    </div>
                    <div class="widget-price-filter pt-3">
                        <h5 class="widget-titlewidget-title">Filter By Price</h5>
                        <ul class="product-tags sidebar-list list-unstyled">
                            <li class="tags-item">
                                <a href="#" class="nav-link">Less than $10</a>
                            </li>
                            <li class="tags-item">
                                <a href="#" class="nav-link">$10- $20</a>
                            </li>
                            <li class="tags-item">
                                <a href="#" class="nav-link">$20- $30</a>
                            </li>
                            <li class="tags-item">
                                <a href="#" class="nav-link">$30- $40</a>
                            </li>
                            <li class="tags-item">
                                <a href="#" class="nav-link">$40- $50</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </aside>

            <main class="col-md-10">
                {{-- <div class="filter-shop d-flex justify-content-between">
                    <div class="showing-product">
                        <p>Showing 1–9 of 55 results</p>
                    </div>
                    <div class="sort-by">
                        <select id="input-sort" class="form-control" data-filter-sort="" data-filter-order="">
                            <option value="">Default sorting</option>
                            <option value="">Name (A - Z)</option>
                            <option value="">Name (Z - A)</option>
                            <option value="">Price (Low-High)</option>
                            <option value="">Price (High-Low)</option>
                            <option value="">Rating (Highest)</option>
                            <option value="">Rating (Lowest)</option>
                            <option value="">Model (A - Z)</option>
                            <option value="">Model (Z - A)</option>
                        </select>
                    </div>
                </div> --}}



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
                                                            <span class="qty">{{ $products->productQuantity }} In
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
                                                                    {{-- <input type="number" name="quantity" class="form-control input-number quantity" value="1" min="1" max="{{ $products->productQuantity }}"> --}}
                                                                    <button class="nav-link center-button">Add to Cart
                                                                        <svg width="18" height="18">
                                                                            <use xlink:href="#cart"></use>
                                                                        </svg>
                                                                    </button>
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
        </main>
    </div>
</div>
</div>





@include('dashboard.footer')
