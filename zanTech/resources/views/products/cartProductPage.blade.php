@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')

<section class="py-5">
    <div class="container-fluid">
        <div class="row g-5">
            <div class="col-md-8">

                <div class="table-responsive cart">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" class="card-title text-uppercase text-muted">Product</th>
                                <th scope="col" class="card-title text-uppercase text-muted">Quantity</th>
                                <th scope="col" class="card-title text-uppercase text-muted">Subtotal</th>
                                <th scope="col" class="card-title text-uppercase text-muted"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($showCart as $showCarts)
                                <tr>
                                    <td scope="row" class="py-4">
                                        <div class="cart-info d-flex flex-wrap align-items-center mb-4">
                                            <div class="col-lg-3">
                                                <div class="card-image">
                                                    <img src="{{ asset('public/product_images/' . $showCarts->productImg) }}"
                                                        alt="cloth" class="img-fluid">
                                                </div>
                                            </div>
                                            <div class="col-lg-9">
                                                <div class="card-detail ps-3">
                                                    <h5 class="card-title">
                                                        <a href="#"
                                                            class="text-decoration-none">{{ $showCarts->name }}</a>
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="input-group product-qty w-50">
                                            <div class="input-group product-qty">
                                                <span class="input-group-btn">
                                                    <button "
                                                        type="button" class="btn btn-danger btn-number"
                                                        onclick="decreaseQty(this)">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#minus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                                <input type="text" name="qty"
                                                    class="form-control input-number quantity"
                                                    value="{{ $showCarts->qty }}" min="1"
                                                    max="{{ $showCarts->productQuantity }}">
                                                <span class="input-group-btn">
                                                    <button
                                                        type="button" class="btn btn-success btn-number"
                                                        onclick="increaseQty(this)">
                                                        <svg width="16" height="16">
                                                            <use xlink:href="#plus"></use>
                                                        </svg>
                                                    </button>
                                                </span>
                                            </div>

                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="total-price">
                                            <span class="money text-dark"><i
                                                    class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $showCarts->price }}</span>
                                        </div>
                                    </td>
                                    <td class="py-4">
                                        <div class="cart-remove">
                                            <a href="{{ route('removeFromCart', ['id' => $showCarts->__raw_id]) }}">
                                                <svg width="24" height="24">
                                                    <use xlink:href="#trash"></use>
                                                </svg>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
            <div class="col-md-4">
                <div class="cart-totals bg-grey py-5">
                    <h4 class="text-dark pb-4">Cart Total</h4>
                    <div class="total-price pb-5">
                        <table cellspacing="0" class="table text-uppercase">
                            <tbody>

                                <tr class="order-total pt-2 pb-2 border-bottom">
                                    <th>Total</th>
                                    <td data-title="Total">
                                        <span class="price-amount amount text-dark ps-5">
                                            <bdi>
                                                <span class="price-currency-symbol"><i
                                                        class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                                {{ ShoppingCart::total() }}</bdi>
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="button-wrap row g-2">
                        <div class="col-md-6"><a href="{{ route('updateCart', ['id' => $showCarts->__raw_id]) }}"
                                class="btn btn-dark py-3 px-4 text-uppercase btn-rounded-none w-100">Update
                                Cart</a></div>
                        <div class="col-md-6"><a href="{{ url('/') }}"
                                class="btn btn-dark py-3 px-4 text-uppercase btn-rounded-none w-100">Continue
                                Shopping</a></div>
                        <div class="col-md-12"><a href="{{ route('checkOutCart') }}"
                                class="btn btn-primary py-3 px-4 text-uppercase btn-rounded-none w-100">Proceed to
                                checkout</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@include('dashboard.footer')
