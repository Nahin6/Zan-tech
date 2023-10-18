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
