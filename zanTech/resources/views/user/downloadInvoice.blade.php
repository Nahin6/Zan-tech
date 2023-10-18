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
                    @php
                        $totalGrand = 0; // Initialize a variable for the grand total
                    @endphp

                    @foreach ($orderInvoice as $invoice)
                        @php
                            $price = $invoice->productPrice;
                            $quantity = $invoice->productQuantity;
                            $totalPrice = $price * $quantity;
                            $totalGrand += $totalPrice; // Add the product total to the grand total
                        @endphp
                    @endforeach

                    <div class="logo_sec">
                        <img src="{{ asset('images/zanPdfLogo.png') }}" alt="code logo">
                        <div class="title_wrap">
                            <p class="title bold">ZAN Tech</p>
                            <p class="sub_title">Awaken your hidden talent.</p>
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
                                        <p>{{ $invoice->productPrice }}</p>
                                    </div>
                                    <div class="col col_qty">
                                        <p>{{ $invoice->productQuantity }}</p>
                                    </div>
                                    <div class="col col_total">
                                        <p>{{ $invoice->productPrice * $invoice->productQuantity }}</p>
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
                                    <span>60</span>
                                </p>
                            @elseif ($invoice->deliveryCharge == 'outsideDhaka')
                                <p class="mt-top">
                                    <span>Delivery Charge</span>
                                    <span>120</span>
                                </p>
                            @endif
                            <p class="bold mt-top">
                                <span>Grand Total</span>
                                <span>{{ $totalGrand + ($invoice->deliveryCharge == 'insideDhaka' ? 60 : 120) }}</span>
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
