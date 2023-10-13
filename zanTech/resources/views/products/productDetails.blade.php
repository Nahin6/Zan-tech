@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')

<section id="selling-product" class="single-product mt-0 mt-md-5">
    <div class="container-fluid">
        <div class="row g-5">
            <div class="col-lg-7">
                <div class="row flex-column-reverse flex-lg-row">
                    <div class="col-md-12 col-lg-2">
                        <!-- product-thumbnail-slider -->
                        <div class="swiper product-thumbnail-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <img src="{{ asset('public/product_images/' . $productDetails->productImg) }}"
                                        alt="errr" class="thumb-image img-fluid">
                                </div>
                            </div>
                        </div>
                        <!-- / product-thumbnail-slider -->
                    </div>
                    <div class="col-md-12 col-lg-10">
                        <!-- product-large-slider -->

                        <div class="swiper product-large-slider">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="image-zoom" data-scale="2.5"><img
                                            src="{{ asset('public/product_images/' . $productDetails->productImg) }}"
                                            alt="product-large" class="img-fluid "></div>
                                </div>
                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                        <!-- / product-large-slider -->
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="product-info">
                    <div class="element-header">
                        <h2 itemprop="name" class="display-6">{{ $productDetails->productName }}</h2>
                    </div>
                    <div class="product-price pt-3 pb-3">
                        <strong class="text-primary display-6 fw-bold"><i class="fa-solid fa-bangladeshi-taka-sign"></i>
                            {{ $productDetails->productPrice }}</strong>

                    </div>
                    <p>{{ $productDetails->shortDetails }}</p>
                    <div class="cart-wrap py-5">
                        <!-- In stock -->
                        <div class="product-quantity pt-3">
                            <div class="stock-number text-dark"><em>{{ $productDetails->productQuantity }} in stock</em>
                            </div>
                            <div class="stock-button-wrap">
                                <!-- quntiyt slide button -->
                                <div class="input-group product-qty" style="max-width: 150px;">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-left-minus btn btn-light btn-number"
                                            data-type="minus" data-field="">
                                            <svg width="16" height="16">
                                                <use xlink:href="#minus"></use>
                                            </svg>
                                        </button>
                                    </span>
                                    <input type="text" id="quantity" name="quantity"
                                        class="form-control input-number text-center" value="1" min="1"
                                        max="100">
                                    <span class="input-group-btn">
                                        <button type="button" class="quantity-right-plus btn btn-light btn-number"
                                            data-type="plus" data-field="">
                                            <svg width="16" height="16">
                                                <use xlink:href="#plus"></use>
                                            </svg>
                                        </button>
                                    </span>
                                </div>
                                <div class="qty-button d-flex flex-wrap pt-3">
                                    <!-- Buy now button -->
                                    <button type="submit"
                                        class="btn btn-primary py-3 px-4 text-uppercase me-3 mt-3">Buy now</button>
                                    <button type="submit" name="add-to-cart" value="1269"
                                        class="btn btn-dark py-3 px-4 text-uppercase mt-3">Add to cart</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="meta-product py-2">
                        <!-- Category -->
                        <div class="meta-item d-flex align-items-baseline">
                            <h6 class="item-title no-margin pe-2">Category:</h6>
                            <ul class="select-list list-unstyled d-flex">
                                <li data-value="S" class="select-item">
                                    <h5>{{ $productDetails->catagory }}</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="product-info-tabs py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="d-flex flex-column flex-md-row align-items-start gap-5">
                <div class="nav flex-row flex-wrap flex-md-column nav-pills me-3 col-lg-3" id="v-pills-tab"
                    role="tablist" aria-orientation="vertical">
                    <button class="nav-link text-start active" id="v-pills-description-tab" data-bs-toggle="pill"
                        data-bs-target="#v-pills-description" type="button" role="tab"
                        aria-controls="v-pills-description" aria-selected="true">Description</button>
                </div>
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-description" role="tabpanel"
                        aria-labelledby="v-pills-description-tab" tabindex="0">
                        <!-- Product Description -->
                        <h5>Product Description</h5>
                        <p>{{ $productDetails->longDetails }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<section class="py-5 overflow-hidden">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">

          <div class="section-header d-flex justify-content-between">
            
            <h2 class="section-title">Related Products</h2>

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
                @foreach ($productDetails->relatedProducts() as $relatedProduct)
              <div class="product-item swiper-slide">
                <a href="#" class="btn-wishlist"><svg width="24" height="24"><use xlink:href="#heart"></use></svg></a>
                <figure>
                  <a href="{{ route('viewProductDetails',$relatedProduct->id) }}" title="Product Title">
                    <img src="{{ asset('public/product_images/' . $relatedProduct->productImg) }}" alt="Product Thumbnail" class="tab-image product-image">
                  </a>
                </figure>
                <h3>{{ $relatedProduct->productName }}</h3>
                <span class="qty">{{ $relatedProduct->productQuantity }} In stock</span>
                
                <span class="price">{{ $relatedProduct->productPrice }}</span>
                <div class="d-flex align-items-center justify-content-between">
                  <div class="input-group product-qty">
                      <span class="input-group-btn">
                          <button type="button" class="quantity-left-minus btn btn-danger btn-number" data-type="minus">
                            <svg width="16" height="16"><use xlink:href="#minus"></use></svg>
                          </button>
                      </span>
                      <input type="text" name="quantity" class="form-control input-number quantity" value="1">
                      <span class="input-group-btn">
                          <button type="button" class="quantity-right-plus btn btn-success btn-number" data-type="plus">
                              <svg width="16" height="16"><use xlink:href="#plus"></use></svg>
                          </button>
                      </span>
                  </div>
                  <a href="#" class="nav-link">Add to Cart <svg width="18" height="18"><use xlink:href="#cart"></use></svg></a>
                </div>
              </div>     
              @endforeach
            </div>
          </div>
          <!-- / products-carousel -->

        </div>
      </div>
    </div>
  </section>
  @include('dashboard.footer')