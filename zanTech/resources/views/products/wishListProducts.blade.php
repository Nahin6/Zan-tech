@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')

<section class="py-5 overflow-hidden">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="section-header d-flex justify-content-between">
                    <h2 class="section-title">Your Wish List Products</h2>
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
        @include('sweetalert::alert')
        <div class="row">
            <div class="col-md-12">
                <div class="products-carousel swiper">
                    <div class="swiper-wrapper">
                        @foreach ($wishlistItems as $item)
                            @if ($item->product)
                                <div class="product-item swiper-slide">
                                    <a href="{{ route('removeWishPrduct', $item->product->id) }}" class="btn-wishlist" data-toggle="tooltip" data-placement="top" title="Remove from Wish List">
                                        <i class="fa-regular fa-trash-can"></i>
                                    </a>


                                    <figure>
                                        <a href="{{ route('viewProductDetails', $item->product->id) }}"
                                            title="Product Title">
                                            <img src="{{ asset('public/product_images/' . $item->product->productImg) }}"
                                                alt="Product Thumbnail" class="tab-image product-image">
                                        </a>
                                    </figure>
                                    <h3>{{ $item->product->productName }}</h3>
                                    <span class="qty">{{ $item->product->productQuantity }} In stock</span>
                                    <span class="price">{{ $item->product->productPrice }}</span>
                                    <form action="{{ route('addToCart', $item->product->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="d-flex align-items-center justify-content-between">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button type="button"
                                                        class="quantity-left-minus btn btn-danger btn-number"
                                                        data-type="minus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" name="qty"
                                                    class="form-control input-number quantity" value="1">
                                                <span class="input-group-btn">
                                                    <button type="button"
                                                        class="quantity-right-plus btn btn-success btn-number"
                                                        data-type="plus">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>
                                            <button href="#" class="nav-link">Add to Cart <svg width="18"
                                                    height="18">
                                                    <use xlink:href="#cart"></use>
                                                </svg></button>
                                        </div>
                                    </form>
                                </div>
                            @else
                                <p>No associated product found.</p>
                            @endif
                        @endforeach
                    </div>
                </div>
                <!-- / products-carousel -->
            </div>
        </div>
    </div>
</section>

@include('dashboard.footer')

