<!DOCTYPE html>
<html>

<head>
    <title>Invoice of ZAN Tech</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css') }}/invoice.css">
</head>

<body>

    <div class="wrapper">
        <div class="invoice_wrapper">
            <div class="header">
                <div class="logo_invoice_wrap">
                    @foreach ($orderInvoice as $invoice)
                        @php
                        //  $totalGrand = 0;
                            //   $singleProduct = \App\Models\Product::find($invoice->id);
                            //     $$singleProductPrice->singleProduct->productPrice
                            // $price = $invoice->singleProductPrice;
                            // $quantity = $invoice->productQuantity;
                            // $totalPrice = $price * $quantity;
                            // $totalGrand += $totalPrice;

                        $discount = ($invoice->totalBill/100)*$invoice->customerPromoDiscount;
                            // $deliveryCharge = 0;
                            //             if ($invoice->deliveryCharge == 'insideDhaka') {
                            //                 $deliveryCharge = 60;
                            //             } elseif ($invoice->deliveryCharge == 'outsideDhaka') {
                            //                 $deliveryCharge = 120;
                            //             }
                            //             $totalAmount = $totalGrand + $deliveryCharge;
                            //             $discount = ( $totalAmount/100)*$invoice->customerPromoDiscount;

                            $finalBIll = $invoice->totalBill-   $discount
                        @endphp
                    @endforeach

                    <div class="logo_sec">
                        <img src="{{ asset('images/zanPdfLogo.png') }}" alt="code logo">
                        <div class="title_wrap">
                            <p class="title bold">ZAN Tech</p>
                            <p class="sub_title">Awaken your hidden talent.</p>
                            <div class="mt-top">
                                <p class="sub_title">Phone: 01619996782,01627199815</p>
                                <p class="sub_title">Email: zantechbd@gmail.com</p>
                            </div>

                        </div>
                    </div>


                    <div class="invoice_sec">
                        <p class="invoice bold">INVOICE</p>
                        <p class="invoice_no">
                            <span class="bold">Invoice</span>
                            <span>{{ $invoice->randInvoice }}</span>
                        </p>
                        <p class="date">
                            <span class="bold">Date</span>
                            <span>{{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d') }}</span>
                        </p>
                    </div>
                </div>

                <div class="bill_total_wrap">
                    <div class="bill_sec">
                        <p>Bill To :</p>
                        <p class="bold name mt-top">{{ $orderInvoice[0]->customerName }}</p>
                        <!-- Use the customer name from the first product -->
                    </div>
                    <div class="bill_sec">
                        <p>Adress:</p>
                        <p class="bold mt-top">{{ $orderInvoice[0]->customerCity }}</p>
                        <p class="bold mt-top">Street no :{{ $orderInvoice[0]->customerStreetAdress }}</p>
                        <p class="bold mt-top">House no :{{ $orderInvoice[0]->customerHomeAdress }}</p>
                        <!-- Use the customer name from the first product -->
                    </div>
                </div>

                <div class="body">
                    <div class="main_table">
                        <div class="table_header">
                            <div class="row">
                                <div class="col col_des">ITEM NAME</div>
                                <div class="col col_price">PRICE</div>
                                <div class="col col_qty">QUANTITY</div>
                                <div class="col col_total">TOTAL</div>
                            </div>
                        </div>
                        <div class="table_body">
                            @foreach ($orderInvoice as $invoice)
                                <div class="row">
                                    <div class="col col_des">
                                        <p class="bold">{{ $invoice->productName }}</p>
                                    </div>
                                    <div class="col col_price">
                                        <p>{{ $invoice->singleProductPrice }}</p>
                                    </div>
                                    <div class="col col_qty">
                                        <p>{{ $invoice->productQuantity }}</p>
                                    </div>
                                    <div class="col col_total">
                                        <p>{{ $invoice->singleProductPrice * $invoice->productQuantity }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="paymethod_grandtotal_wrap">
                        <div class="paymethod_sec"></div>
                        <div class="grandtotal_sec">
                            @if ($invoice->deliveryCharge == 'insideDhaka')
                                <p class="mt-top">
                                    <span>Delivery Charge</span>
                                    <span>60 TK</span>
                                </p>
                            @elseif ($invoice->deliveryCharge == 'outsideDhaka')
                                <p class="mt-top">
                                    <span>Delivery Charge</span>
                                    <span>120 TK</span>
                                </p>
                            @endif
                            <p class="mt-top">
                                <span>Total</span>
                                <span>  {{ $invoice->totalBill }} TK</span>
                            </p>
                            @if ($invoice->customerPromoCode)
                                <p class="mt-top">
                                    <span>Discount({{ $invoice->customerPromoDiscount }}%)</span>
                                    <span>- {{ number_format($discount, 0) }} TK</span>
                                </p>
                                @endif

                            <p class="bold mt-top">
                                <span>Grand Total</span>

                                <span>
                                    {{-- @php
                                        $deliveryCharge = 0;
                                        if ($invoice->deliveryCharge == 'insideDhaka') {
                                            $deliveryCharge = 60;
                                        } elseif ($invoice->deliveryCharge == 'outsideDhaka') {
                                            $deliveryCharge = 120;
                                        }
                                        $totalAmount = $totalGrand + $deliveryCharge;
                                        $discount = ( $totalAmount/100)*$invoice->customerPromoDiscount;
                                        $finalAmount =  $totalAmount - $discount;
                                    @endphp --}}
                                    {{-- {{ $finalAmount }} TK --}}
                                    {{ number_format($finalBIll) }} TK

                                </span>

                            </p>
                        </div>
                    </div>
                </div>

                <div class="footer">
                    <p>Thank you and Best Wishes</p>
                </div>

            </div>


</body>

</html>
