@extends('dashboard.dashboard')

@section('content')



{{-- Hero section start --}}
<section class="py-3">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="banner-blocks">

            <div class="banner-ad large bg-info block-1">

              <div class="swiper main-swiper">
                <div class="swiper-wrapper">
                  <!-- 1st banner -->
                  <div class="swiper-slide">
                    <div class="row banner-content p-5">
                      <div class="content-wrapper col-md-7">
                        <!-- <div class="categories my-3">100% natural</div> -->
                        <h3 class="display-4">Line Following Robot</h3>
                        <p>A line-following robot uses sensors to detect and follow a visible path, like a marked line, by making real-time adjustments.</p>
                        <a href="{{ route('displayProject') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1 px-4 py-3 mt-3">See more</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="{{ asset('images/lfr banner.png') }}" alt="Product Thumbnail" class="img-fluid">
                      </div>
                    </div>
                  </div>
                  <!-- 2nd banner -->
                  <div class="swiper-slide">
                    <div class="row banner-content p-5">
                      <div class="content-wrapper col-md-7">
                        <!-- <div class="categories mb-3 pb-3">100% natural</div> -->
                        <h3 class="banner-title">Line Maze solver</h3>
                        <p>A maze-solving robot follows lines and figures out the best way to escape all by itself, using smart technology and special sensors.</p>
                        <a href="{{ route('displayProject') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">See more</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="{{ asset('images\Maze line.png') }}" alt="Product Thumbnail" class="img-fluid">
                      </div>
                    </div>
                  </div>
                  <!-- 3rd banner -->
                  <div class="swiper-slide">
                    <div class="row banner-content p-5">
                      <div class="content-wrapper col-md-7">
                        <!-- <div class="categories mb-3 pb-3">100% natural</div> -->
                        <h3 class="banner-title">Soccer Bot</h3>
                        <p>A soccer bot quickly moves the ball and kicks it towards the goal, trying to score with skill and speed.</p>
                        <a href="{{ route('displayProject') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">See more</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="{{ asset('images\soccer3d.png') }}" alt="Product Thumbnail" class="img-fluid">
                      </div>
                    </div>
                  </div>
                  <!-- 4th banner -->
                  <div class="swiper-slide">
                    <div class="row banner-content p-5">
                      <div class="content-wrapper col-md-7">
                        <!-- <div class="categories mb-3 pb-3">100% natural</div> -->
                        <h3 class="banner-title">Egg Sat</h3>
                        <p>In the egg drop contest, a box with sensors and a parachute is dropped from a height. The goal is to use the sensor data to keep the egg safe and unbroken when it lands.</p>
                        <a href="{{ route('displayProject') }}" class="btn btn-outline-dark btn-lg text-uppercase fs-6 rounded-1">See more</a>
                      </div>
                      <div class="img-wrapper col-md-5">
                        <img src="{{ asset('images\egg sat.png') }}" alt="Product Thumbnail" class="img-fluid">
                      </div>
                    </div>
                  </div>
                </div>

                <div class="swiper-pagination"></div>
              </div>
            </div>
            <!-- Right side 1st banner -->
            <div class="banner-ad bg-success-subtle block-2" style="background:url('{{ asset('images/ad-image-1.png') }}') no-repeat;background-position: right bottom">
              <div class="row banner-content p-5">

                <div class="content-wrapper col-md-7">
                  <!-- <div class="categories sale mb-3 pb-3">20% off</div> -->
                  <h3 class="banner-title">Customize Robot Making</h3>
                  <a href="{{ route('static-page', ['slug' => 'contactPage'])}}" class="d-flex align-items-center nav-link">Contact Now <svg width="24" height="24"><use xlink:href="#arrow-right"></use></svg></a>
                </div>

              </div>
            </div>
            <!-- Right side 2nd banner -->
            <div class="banner-ad bg-danger block-3" style="background:url('{{ asset('images/ad-image-2.png') }}') no-repeat;background-position: right bottom">
              <div class="row banner-content p-5">

                <div class="content-wrapper col-md-7">
                  <!-- <div class="categories sale mb-3 pb-3">15% off</div> -->
                  <h3 class="item-title">Cash on Delivery all over Bangladesh</h3>
                  <a href="{{ route('viewShop') }}" class="d-flex align-items-center nav-link">Shop Now <svg width="24" height="24"><use xlink:href="#arrow-right"></use></svg></a>
                </div>

              </div>
            </div>

          </div>
          <!-- / Banner Blocks -->

        </div>
      </div>
    </div>
  </section>

  {{-- hero section ends --}}





  {{-- most popular products starts --}}

<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex justify-content-between">

                    <h2 class="section-title">Most Populer Products</h2>

                    <div class="d-flex align-items-center">
                        <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                            <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="products-carousel swiper">
                    <div class="swiper-wrapper">
                        @foreach ($trendingProducts as $trendingProduct)
                            <div class="product-item swiper-slide">
                                <a href="{{ route('addProductToWishListNew', $trendingProduct->id) }}"
                                    class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="{{ route('viewProductDetails', $trendingProduct->id) }}"
                                        title="Product Title">
                                        <img src="{{ asset('public/product_images/' . $trendingProduct->productImg) }}"
                                            alt="Product Thumbnail" class="tab-image product-image">
                                    </a>
                                </figure>
                                <h3>{{ $trendingProduct->productName }}</h3>
                                <span class="qty">{{ $trendingProduct->productQuantity }} In stock</span>

                                <span class="price">{{ $trendingProduct->productPrice }}</span>
                                <form action="{{ route('addToCart', $trendingProduct->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="text" name="qty" hidden
                                            class="form-control input-number quantity" value="1">
                                        @if ($trendingProduct->productQuantity == 0)
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
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- / products-carousel -->

            </div>
        </div>
    </div>
</section>
{{-- most popular products ends --}}



  {{-- Just arrived products starts --}}

  <section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="section-header d-flex justify-content-between">

                    <h2 class="section-title">Just arrived</h2>

                    <div class="d-flex align-items-center">
                        <a href="#" class="btn-link text-decoration-none">View All Categories →</a>
                        <div class="swiper-buttons">
                            <button class="swiper-prev products-carousel-prev btn btn-primary">❮</button>
                            <button class="swiper-next products-carousel-next btn btn-primary">❯</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                @include('sweetalert::alert')
                <div class="products-carousel swiper">
                    <div class="swiper-wrapper">
                        @foreach ($latestProducts as $bestProducts)
                            <div class="product-item swiper-slide">
                                <a href="{{ route('addProductToWishListNew', $bestProducts->id) }}"
                                    class="btn-wishlist"><svg width="24" height="24">
                                        <use xlink:href="#heart"></use>
                                    </svg></a>
                                <figure>
                                    <a href="{{ route('viewProductDetails', $bestProducts->id) }}"
                                        title="Product Title">
                                        <img src="{{ asset('public/product_images/' . $bestProducts->productImg) }}"
                                            alt="Product Thumbnail" class="tab-image product-image">
                                    </a>
                                </figure>
                                <h3>{{ $bestProducts->productName }}</h3>
                                <span class="qty">{{ $bestProducts->productQuantity }} In stock</span>
                                <span class="price">{{ $bestProducts->productPrice }}</span>
                                <form action="{{ route('addToCart', $bestProducts->id) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="d-flex align-items-center justify-content-between">
                                        <input type="text" name="qty" hidden
                                            class="form-control input-number quantity" value="1">
                                        @if ($bestProducts->productQuantity == 0)
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
                                    </div>
                                </form>
                            </div>
                        @endforeach
                    </div>
                </div>
                <!-- / products-carousel -->

            </div>
        </div>
    </div>
</section>



  {{-- Just arrived products ends --}}



  {{-- All products starts --}}

  <section class="py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="bootstrap-tabs product-tabs">
                    <div class="tabs-header d-flex justify-content-between border-bottom my-5">
                        <h3>All Products</h3>
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

  {{-- All products ends --}}


@endsection
