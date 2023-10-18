@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')

<section class="shopify-cart checkout-wrap py-5">
    @include('sweetalert::alert')
    <div class="container-fluid">
        @foreach ($chekoutCart as $chekoutCarts)
            <form class="form-group" action="{{ route('placeOrder', ['id' => $chekoutCarts->__raw_id]) }}" method="POST"
                enctype="multipart/form-data">
                @csrf
        @endforeach
        <div class="row d-flex flex-wrap">
            <div class="col-lg-6">
                <h4 class="text-dark pb-4">Billing Details</h4>
                <div class="billing-details">
                    <label for="cname">Divisions</label>
                    <select id="adr" class="form-select form-control mt-2 mb-4" name="division"
                        aria-label="Default select example">
                        <option selected="" hidden="">Select Division</option>
                        <option value="Dhaka">Dhaka</option>
                        <option value="Chittagong">Chittagong</option>
                        <option value="Khulna">Khulna</option>
                        <option value="Mymensingh">Mymensingh</option>
                        <option value="Rajshahi">Rajshahi</option>
                        <option value="Rangpur">Rangpur</option>
                        <option value="Sylhet">Sylhet</option>
                        <option value="Barisal">Barisal</option>
                    </select>
                    @error('division')
                        <div class="text-red fw-bold">{{ $message }}</div>
                    @enderror
                    <label for="city">Town / City *</label>
                    <input type="text" id="adr" name="city" class="form-control mt-3 ps-3 mb-4">
                    @error('city')
                        <div class="text-red ">{{ $message }}</div>
                    @enderror
                    <label for="address">Street Address*</label>
                    <input type="text" id="adr" name="streetAddress" placeholder="Road number & block"
                        class="form-control">
                    @error('streetAddress')
                        <div class="text-red">{{ $message }}</div>
                    @enderror
                    <label for="address">Home Address*</label>
                    <input type="text" id="adr" name="homeAddress" placeholder="House name/number "
                        class="form-control mt-3 ps-3 mb-3">
                    @error('homeAddress')
                        <div class="text-red ">{{ $message }}</div>
                    @enderror

                </div>
            </div>
            <div class="col-lg-6">
                <h4 class="text-dark pb-4">Additional Information</h4>
                <div class="billing-details">
                    <label for="fname">Order notes (optional)</label>
                    <textarea id="adr" class="form-control pt-3 pb-3 ps-3 mt-2" name="addtionalInfo"
                        placeholder="Notes about your order. Like special notes for delivery."></textarea>
                </div>
                <div class="your-order mt-5">
                    <h4 class="display-7 text-dark pb-4">Cart Totals</h4>
                    <div class="total-price">
                        <table cellspacing="0" class="table">
                            <tbody>

                                <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                    <th>Add Promo Code</th>
                                    <td data-title="Subtotal">
                                        <span class="price-amount amount">
                                            <input type="text" id="adr" name="promoCode"
                                                class="form-control ps-3" placeholder="Promo code">
                                            <input type="hidden" id="lname" name="totalBill"
                                                value="{{ ShoppingCart::total() }}" class="form-control ps-3"
                                                placeholder="Promo code">
                                        </span>
                                    </td>
                                </tr>

                                <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                    <th>Subtotal</th>
                                    <td data-title="Subtotal">
                                        <span class="price-amount amount ps-2">
                                            <bdi>
                                                <span class="price-currency-symbol"><i
                                                        class="fa-solid fa-bangladeshi-taka-sign"></i>
                                                </span>{{ ShoppingCart::total() }}</bdi>
                                        </span>
                                    </td>
                                </tr>

                                <tr class="subtotal border-top border-bottom pt-2 pb-2 text-uppercase">
                                    <th>delivery charges</th>
                                    <td data-title="Subtotal">
                                        <span class="price-amount amount"></span>
                                            <input type="radio" id="insideDhaka" name="deliveryCharge" value="insideDhaka" >
                                            <label for="insideDhaka">Inside Dhaka <strong>60<i class="fa-solid fa-bangladeshi-taka-sign"></i></strong></label><br>

                                            <input type="radio" id="outsideDhaka" name="deliveryCharge" value="outsideDhaka">
                                            <label for="outsideDhaka">Outside Dhaka <strong>120<i class="fa-solid fa-bangladeshi-taka-sign"></i></strong></label><br>

                                            <input type="radio" id="pickupPoint" name="deliveryCharge" value="pickupPoint" checked>
                                            <label for="pickupPoint">Pickup Point <strong>Bashundhara R/A</strong></label>
                                        </span>
                                    </td>

                                </tr>

                                <tr class="order-total border-bottom pt-2 pb-2 text-uppercase">
                                    <th>Total</th>
                                    <td data-title="Total">
                                        <span class="price-amount amount ps-2">
                                            <bdi>
                                                <span id="updateTotal" class="price-currency"><i
                                                        class="fa-solid fa-bangladeshi-taka-sign"></i> </span>
                                                <span id="totalPrice">{{ ShoppingCart::total() }}</span>
                                            </bdi>
                                        </span>
                                    </td>

                                </tr>
                            </tbody>
                        </table>
                        <div class="list-group mt-5 mb-3">
                            <label class="list-group-item d-flex gap-2 border-0">
                                <input class="form-check-input flex-shrink-0" type="radio" name="listGroupRadios"
                                    id="listGroupRadios3" value="" checked>
                                <span>
                                    <strong class="text-uppercase">Cash on delivery</strong>
                                    <small class="d-block text-body-secondary">Pay with cash upon delivery.</small>
                                </span>
                            </label>
                        </div>
                        <button type="submit" name="submit"
                            class="btn btn-dark btn-lg text-uppercase btn-rounded-none w-100">Place an order</button>
                    </div>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>
@include('dashboard.footer')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalPriceElement = document.querySelector('#totalPrice');
        const radioButtons = document.querySelectorAll('input[name="deliveryCharge"]');
        let additionalCharge = 0; // Initialize the additional charge
        let originalPrice = parseFloat(totalPriceElement.textContent);

        function updateTotalPrice() {
            const newTotal = originalPrice + additionalCharge;
            totalPriceElement.textContent = newTotal.toFixed(2);
        }

        radioButtons.forEach(function(radioButton) {
            radioButton.addEventListener('change', function() {
                if (this.value === 'insideDhaka') {
                    additionalCharge = 60;
                } else if (this.value === 'outsideDhaka') {
                    additionalCharge = 120;
                } else {
                    additionalCharge = 0; // Reset the additional charge for Pickup Point
                }

                updateTotalPrice();
            });
        });

        // Initial calculation
        updateTotalPrice();
    });
</script>

