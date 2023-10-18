@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')

@if (ShoppingCart::isEmpty())
    <section class="py-5 mb-5" style="background: url(images/Banner/background-pattern.png);">
        <div class="container-fluid">
            <div class=" text-center">
                <h1 class="page-title pb-2 ">Your cart Is Empty!!</h1>
            </div>
            <h2 class="page-title pb-2 text-center">Add some Product to cart first</h2>
        </div>
    </section>
@else
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
                                    <th scope="col" class="card-title text-uppercase text-muted">Total</th>
                                    <th scope="col" class="card-title text-uppercase text-muted"></th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($productQuantities as $qtt)
                                    <span class="qty">{{ $qtt->productQuantity }} In stock</span>
                                @endforeach --}}
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
                                        @php
                                        $quantity = $showCarts->qty;
                                        $price = $showCarts->price;
                                        $totalPrice = $price * $quantity;


                                        $product = \App\Models\Product::find($showCarts->id);
                                        $quantity = $product->productQuantity;

                                        $availableQuantity = $quantity;

                                        // Get the selected quantity
                                        $selectedQuantity = $showCarts->qty;

                                        // Determine whether to disable the buttons
                                        $disableDecrease = $selectedQuantity <= 1;
                                        $disableIncrease = $selectedQuantity >= $availableQuantity;
                                    @endphp
                                        <td class="py-4">
                                            <form
                                                action="{{ route('updateCartProduct', ['id' => $showCarts->__raw_id]) }}"
                                                method="POST">
                                                @csrf
                                                {{-- <div class="input-group">
                                                    <button id="decreaseQtyButton"
                                                        onclick="producthandlechange('{{ $showCarts->name }}',false)"
                                                        class="btn btn-danger">
                                                        -
                                                    </button>
                                                    <input class="form-control text-center" id="{{ $showCarts->name }}"
                                                        value="{{ $showCarts->qty }}" name="qty" readonly
                                                        min="1" max="{{ $showCarts->qty }}" required />
                                                    <button id="increaseQtyButton" onclick="producthandlechange('{{ $showCarts->name }}',true)"
                                                        class="btn btn-success">
                                                        +
                                                    </button>
                                                </div> --}}
                                                <div class="input-group">
                                                    <button id="decreaseQtyButton"
                                                        onclick="producthandlechange('{{ $showCarts->name }}', false)"
                                                        class="btn btn-danger" {{ $disableDecrease ? 'disabled' : '' }}>
                                                        -
                                                    </button>
                                                    <input class="form-control text-center" id="{{ $showCarts->name }}"
                                                    value="{{ $showCarts->qty }}" name="qty" readonly
                                                    min="1" max="{{ $showCarts->qty }}" required />
                                                    <button id="increaseQtyButton"
                                                        onclick="producthandlechange('{{ $showCarts->name }}', true)"
                                                        class="btn btn-success"
                                                        {{ $disableIncrease ? 'disabled' : '' }}>
                                                        +
                                                    </button>
                                                </div>
                                            </form>
                    </div>
                    </td>
                    {{-- <input type="hidden" name="Pquantity" value="{{ $quantity }}"> --}}



                            {{-- <span class="money text-dark" style="display: none;">{{ $quantity }}</span> --}}

                    <td class="py-4">
                        <div class="total-price">
                            <span class="money text-dark"><i
                                    class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $showCarts->price }}</span>
                        </div>
                    </td>
                    <td class="py-4">
                        <div class="total-price">
                            <span class="money text-dark"><i
                                    class="fa-solid fa-bangladeshi-taka-sign"></i>{{ $totalPrice }}</span>
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
        <h4 class="text-dark pb-4">Cart Total Price</h4>
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
            {{-- {{ route('updateCart', ['id' => $showCarts->__raw_id]) }}s --}}
            {{-- <div class="col-md-6"><a href=""
                                class="btn btn-dark py-3 px-4 text-uppercase btn-rounded-none w-100">Update
                                Cart</a></div> --}}
            <div class="col-md-12"><a href="{{ url('/') }}"
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
@endif
@include('dashboard.footer')

<script>
    function producthandlechange(product, increace) {
        const productinput = document.getElementById(product);
        const productcount = parseInt(productinput.value);
        if (increace == true) {
            productinput.value = productcount + 1;
        } else if (increace == false && productcount > 1) {
            productinput.value = productcount - 1;
        }
    }

    document.addEventListener('DOMContentLoaded', function() {
        const qtyInput = document.querySelector('input[name="Pquantity"]');
        const increaseQtyButton = document.getElementById('increaseQtyButton');
        const decreaseQtyButton = document.getElementById('decreaseQtyButton'); // Add this
        const productQuantity = $quantity; // Replace with your actual product quantity

        increaseQtyButton.addEventListener('click', function() {
            const currentQty = parseInt(qtyInput.value);

            // Disable the "+" button when the input reaches the product quantity
            if (parseInt(qtyInput.value) === productQuantity) {
                increaseQtyButton.setAttribute('disabled', true);
            }

            // Enable the "-" button when increasing the quantity
            decreaseQtyButton.removeAttribute('disabled');
        });

        decreaseQtyButton.addEventListener('click', function() {
            const currentQty = parseInt(qtyInput.value);


            // Enable the "+" button when decreasing the quantity
            increaseQtyButton.removeAttribute('disabled');

            // Disable the "-" button when the input reaches 1
            if (parseInt(qtyInput.value) === 1) {
                decreaseQtyButton.setAttribute('disabled', true);
            }
        });

        qtyInput.addEventListener('input', function() {
            if (parseInt(qtyInput.value) < productQuantity) {
                increaseQtyButton.removeAttribute('disabled');
            }
            if (parseInt(qtyInput.value) > 1) {
                decreaseQtyButton.removeAttribute('disabled');
            }
        });
    });
</script>
