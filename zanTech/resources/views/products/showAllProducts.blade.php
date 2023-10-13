{{--
 <div class="container">
     <div class="d-flex justify-content-start mt-3">
         <h2>The Best Offers</h2>
     </div>
     <span class="d-flex justify-content-end mb-2"><button type="button" class="btn btn-outline-info">View
             More</button></span>
     <div class="row">

        @foreach ($bestProducts as $bestProduct)
        <div class="col-sm-2">
            <div class="card">
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="public/product_images/{{ $bestProduct->productImg }}" id="img-resize" class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $bestProduct->productName }}</h5>
                    <h5 class="card-title">{{ $bestProduct->catagory }}</h5>
                    <p class="card-text"><i
                            class="fa-solid fa-check fa-lg text-info"></i>{{ $bestProduct->shortDetails }}</p>
                    <p class="text-success bold">{{ $bestProduct->productPrice }} <i
                            class="fa-solid fa-bangladeshi-taka-sign fa-xs text-success"></i> </p>
                    <a href="#!" class="btn btn-primary center">ADD TO CAR</a>

                </div>
            </div>
        </div>
    @endforeach

     </div>
 </div>


 <div class="container">
     <div class="d-flex justify-content-start mt-5">
         <h2>Product</h2>
     </div>
     <span class="d-flex justify-content-end mb-2"><button type="button" class="btn btn-outline-info">View
             More</button></span>
     <div class="row">

         @foreach ($product as $products)
             <div class="col-sm-2">
                 <div class="card">
                     <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                         <img src="public/product_images/{{ $products->productImg }}" id="img-resize"  class="img-fluid" />
                         <a href="#!">
                             <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                         </a>
                     </div>
                     <div class="card-body">
                         <h5 class="card-title">{{ $products->productName }}</h5>
                         <h5 class="card-title">{{ $products->catagory }}</h5>
                         <p class="card-text"><i
                                 class="fa-solid fa-check fa-lg text-info"></i>{{ $products->shortDetails }}</p>
                         <p class="text-success bold">{{ $products->productPrice }} <i
                                 class="fa-solid fa-bangladeshi-taka-sign fa-xs text-success"></i> </p>
                         <a href="#!" class="btn btn-primary center">ADD TO CART</a>

                     </div>
                 </div>
             </div>
         @endforeach


     </div>
 </div> --}}


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
                                                    <input type="text" name="quantity"
                                                        class="form-control input-number quantity" value="1"
                                                        min="1" max="{{ $products->productQuantity }}">
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
                                                {{-- <input type="number" name="quantity" class="form-control input-number quantity" value="1" min="1" max="{{ $products->productQuantity }}"> --}}



                                                <a href="#" class="nav-link">Add to Cart
                                                    <svg width="18" height="18">
                                                        <use xlink:href="#cart"></use>
                                                    </svg>
                                                </a>
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


<script>
    $(document).ready(function() {
        // Wait for the document to be fully loaded

        // Find the success message div by its ID
        var successMessage = $('#success-message');

        // Check if the success message div exists
        if (successMessage.length) {
            // Set a timeout to hide the div after 4 seconds (4000 milliseconds)
            setTimeout(function() {
                successMessage.slideUp(); // Hide the div with a slide-up animation
            }, 5000); // 4000 milliseconds (4 seconds)
        }
    });
</script>
