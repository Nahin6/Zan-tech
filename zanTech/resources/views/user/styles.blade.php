{{-- <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script


<style type="text/css">

 body{
background:#eee;
margin-top:20px;
}
.text-danger strong {
        	color: #9f181c;
		}
		.receipt-main {
			background: #ffffff none repeat scroll 0 0;
			border-bottom: 12px solid #333333;
			border-top: 12px solid #9f181c;
			margin-top: 50px;
			margin-bottom: 50px;
			padding: 40px 30px !important;
			position: relative;
			box-shadow: 0 1px 21px #acacac;
			color: #333333;
			font-family: open sans;
		}
		.receipt-main p {
			color: #333333;
			font-family: open sans;
			line-height: 1.42857;
		}
		.receipt-footer h1 {
			font-size: 15px;
			font-weight: 400 !important;
			margin: 0 !important;
		}
		.receipt-main::after {
			background: #414143 none repeat scroll 0 0;
			content: "";
			height: 5px;
			left: 0;
			position: absolute;
			right: 0;
			top: -13px;
		}
		.receipt-main thead {
			background: #414143 none repeat scroll 0 0;
		}
		.receipt-main thead th {
			color:#fff;
		}
		.receipt-right h5 {
			font-size: 16px;
			font-weight: bold;
			margin: 0 0 7px 0;
		}
		.receipt-right p {
			font-size: 12px;
			margin: 0px;
		}
		.receipt-right p i {
			text-align: center;
			width: 18px;
		}
		.receipt-main td {
			padding: 9px 20px !important;
		}
		.receipt-main th {
			padding: 13px 20px !important;
		}
		.receipt-main td {
			font-size: 13px;
			font-weight: initial !important;
		}
		.receipt-main td p:last-child {
			margin: 0;
			padding: 0;
		}
		.receipt-main td h2 {
			font-size: 20px;
			font-weight: 900;
			margin: 0;
			text-transform: uppercase;
		}
		.receipt-header-mid .receipt-left h1 {
			font-weight: 100;
			margin: 34px 0 0;
			text-align: right;
			text-transform: uppercase;
		}
		.receipt-header-mid {
			margin: 24px 0;
			overflow: hidden;
		}

		#container {
			background-color: #dcdcdc;
		}
</style> --}}


{{-- <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');

    :root {
        --primary: #0000ff;
        --secondary: #3d3d3d;
        --white: #fff;
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'Lato', sans-serif;
    }

    body {
        background: #3d3d3d;
        padding: 50px;
        color: #3d3d3d;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
    }

    .bold {
        font-weight: 900;
    }

    .light {
        font-weight: 100;
    }

    .wrapper {
        background: #fff;
        padding: 30px;
    }

    .invoice_wrapper {
        border: 3px solid #0000ff;
        width: 700px;
        max-width: 100%;
    }

    .invoice_wrapper .header .logo_invoice_wrap,
    .invoice_wrapper .header .bill_total_wrap {
        display: flex;
        justify-content: space-between;
        padding: 30px;
    }

    .invoice_wrapper .header .logo_sec {
        display: flex;
        align-items: center;
    }

    .invoice_wrapper .header .logo_sec .title_wrap {
        margin-left: 5px;
    }

    .invoice_wrapper .header .logo_sec .title_wrap .title {
        text-transform: uppercase;
        font-size: 18px;
        color: #0000ff;
    }

    .invoice_wrapper .header .logo_sec .title_wrap .sub_title {
        font-size: 12px;
    }

    .invoice_wrapper .header .invoice_sec,
    .invoice_wrapper .header .bill_total_wrap .total_wrap {
        text-align: right;
    }

    .invoice_wrapper .header .invoice_sec .invoice {
        font-size: 28px;
        color: #0000ff;
    }

    .invoice_wrapper .header .invoice_sec .invoice_no,
    .invoice_wrapper .header .invoice_sec .date {
        display: flex;
        width: 100%;
    }

    .invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
    .invoice_wrapper .header .invoice_sec .date span:first-child {
        width: 70px;
        text-align: left;
    }

    .invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
    .invoice_wrapper .header .invoice_sec .date span:last-child {
        width: calc(100% - 70px);
    }

    .invoice_wrapper .header .bill_total_wrap .total_wrap .price,
    .invoice_wrapper .header .bill_total_wrap .bill_sec .name {
        color: #0000ff;
        font-size: 20px;
    }

    .invoice_wrapper .body .main_table .table_header {
        background: #0000ff;
    }

    .invoice_wrapper .body .main_table .table_header .row {
        color: #fff;
        font-size: 18px;
        border-bottom: 0px;
    }

    .invoice_wrapper .body .main_table .row {
        display: flex;
        border-bottom: 1px solid #3d3d3d;
    }

    .invoice_wrapper .body .main_table .row .col {
        padding: 10px;
    }

    .invoice_wrapper .body .main_table .row .col_no {
        width: 5%;
    }

    .invoice_wrapper .body .main_table .row .col_des {
        width: 45%;
    }

    .invoice_wrapper .body .main_table .row .col_price {
        width: 20%;
        text-align: center;
    }

    .invoice_wrapper .body .main_table .row .col_qty {
        width: 10%;
        text-align: center;
    }

    .invoice_wrapper .body .main_table .row .col_total {
        width: 20%;
        text-align: right;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap {
        display: flex;
        justify-content: space-between;
        padding: 5px 0 30px;
        align-items: flex-end;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .paymethod_sec {
        padding-left: 30px;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec {
        width: 30%;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p {
        display: flex;
        width: 100%;
        padding-bottom: 5px;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span {
        padding: 0 10px;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:first-child {
        width: 60%;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:last-child {
        width: 40%;
        text-align: right;
    }

    .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p:last-child span {
        background: #0000ff;
        padding: 10px;
        color: #fff;
    }

    .invoice_wrapper .footer {
        padding: 30px;
    }

    .invoice_wrapper .footer>p {
        color: #0000ff;
        text-decoration: underline;
        font-size: 18px;
        padding-bottom: 5px;
    }

    .invoice_wrapper .footer .terms .tc {
        font-size: 16px;
    }

    .mt-top {
        margin-top: 10px;
    }
</style> --}}


<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Invoice of ZAN Tech</title>
    {{-- <link rel="stylesheet" type="text/css" href="{{URL::asset('css/invoice.css') }}"> --}}
    {{-- <link rel="stylesheet" type="text/css" href="{{ ltrim(elixir('css/invoice.css'), '/') }}"> --}}


    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Lato:wght@100;400;900&display=swap');

        :root {
            --primary: #0000ff;
            --secondary: #3d3d3d;
            --white: #fff;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Lato', sans-serif;
        }

        body {
            background: var(--secondary);
            padding: 50px;
            color: var(--secondary);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
        }

        .bold {
            font-weight: 900;
        }

        .light {
            font-weight: 100;
        }

        .wrapper {
            background: var(--white);
            padding: 30px;
        }

        .invoice_wrapper {
            border: 3px solid var(--primary);
            width: 700px;
            max-width: 100%;
        }

        .invoice_wrapper .header .logo_invoice_wrap,
        .invoice_wrapper .header .bill_total_wrap {
            display: flex;
            justify-content: space-between;
            padding: 30px;
        }

        .invoice_wrapper .header .logo_sec {
            display: flex;
            align-items: center;
        }

        .invoice_wrapper .header .logo_sec .title_wrap {
            margin-left: 5px;
        }

        .invoice_wrapper .header .logo_sec .title_wrap .title {
            text-transform: uppercase;
            font-size: 18px;
            color: var(--primary);
        }

        .invoice_wrapper .header .logo_sec .title_wrap .sub_title {
            font-size: 12px;
        }

        .invoice_wrapper .header .invoice_sec,
        .invoice_wrapper .header .bill_total_wrap .total_wrap {
            text-align: right;
        }

        .invoice_wrapper .header .invoice_sec .invoice {
            font-size: 28px;
            color: var(--primary);
        }

        .invoice_wrapper .header .invoice_sec .invoice_no,
        .invoice_wrapper .header .invoice_sec .date {
            display: flex;
            width: 100%;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:first-child,
        .invoice_wrapper .header .invoice_sec .date span:first-child {
            width: 70px;
            text-align: left;
        }

        .invoice_wrapper .header .invoice_sec .invoice_no span:last-child,
        .invoice_wrapper .header .invoice_sec .date span:last-child {
            width: calc(100% - 70px);
        }

        .invoice_wrapper .header .bill_total_wrap .total_wrap .price,
        .invoice_wrapper .header .bill_total_wrap .bill_sec .name {
            color: var(--primary);
            font-size: 20px;
        }

        .invoice_wrapper .body .main_table .table_header {
            background: var(--primary);
        }

        .invoice_wrapper .body .main_table .table_header .row {
            color: var(--white);
            font-size: 18px;
            border-bottom: 0px;
        }

        .invoice_wrapper .body .main_table .row {
            display: flex;
            border-bottom: 1px solid var(--secondary);
        }

        .invoice_wrapper .body .main_table .row .col {
            padding: 10px;
        }

        .invoice_wrapper .body .main_table .row .col_no {
            width: 5%;
        }

        .invoice_wrapper .body .main_table .row .col_des {
            width: 45%;
        }

        .invoice_wrapper .body .main_table .row .col_price {
            width: 20%;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_qty {
            width: 10%;
            text-align: center;
        }

        .invoice_wrapper .body .main_table .row .col_total {
            width: 20%;
            text-align: right;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap {
            display: flex;
            justify-content: space-between;
            padding: 5px 0 30px;
            align-items: flex-end;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .paymethod_sec {
            padding-left: 30px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec {
            width: 30%;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p {
            display: flex;
            width: 100%;
            padding-bottom: 5px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span {
            padding: 0 10px;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:first-child {
            width: 60%;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p span:last-child {
            width: 40%;
            text-align: right;
        }

        .invoice_wrapper .body .paymethod_grandtotal_wrap .grandtotal_sec p:last-child span {
            background: var(--primary);
            padding: 10px;
            color: #fff;
        }

        .invoice_wrapper .footer {
            padding: 30px;
        }

        .invoice_wrapper .footer>p {
            color: var(--primary);
            text-decoration: underline;
            font-size: 18px;
            padding-bottom: 5px;
        }

        .invoice_wrapper .footer .terms .tc {
            font-size: 16px;
        }

        .mt-top {
            margin-top: 10px;
        }

        @media print {
            #downloadInvoice {
                display: none;
            }
        }
    </style>
</head>

<body>

    <div class="wrapper" id="invoiceTotal">
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

                            $discount = ($invoice->totalBill / 100) * $invoice->customerPromoDiscount;
                            // $deliveryCharge = 0;
                            //             if ($invoice->deliveryCharge == 'insideDhaka') {
                            //                 $deliveryCharge = 60;
                            //             } elseif ($invoice->deliveryCharge == 'outsideDhaka') {
                            //                 $deliveryCharge = 120;
                            //             }
                            //             $totalAmount = $totalGrand + $deliveryCharge;
                            //             $discount = ( $totalAmount/100)*$invoice->customerPromoDiscount;

                            $finalBIll = $invoice->totalBill - $discount;
                        @endphp
                    @endforeach

                    <div class="logo_sec">
                        {{-- <img src="{{ asset('images/zanPdfLogo.png') }}" alt="code logo"> --}}
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
                                <span> {{ $invoice->totalBill }} TK</span>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>


<button id="downloadInvoice" onclick="downloadInvoice()">Download Invoice</button>



<script>
    // function downloadInvoice() {
    //     var element = document.body;
    //     var options = {
    //         margin: 10,  // Adjust margin as needed
    //         filename: 'invoice.pdf',
    //         image: { type: 'jpeg', quality: 0.98 },
    //         html2canvas: { scale: 2 },
    //         jsPDF: { unit: 'pt', format: 'letter', orientation: 'portrait' }
    //     };
    //     html2pdf().from(element).set(options).save();
    // }
    window.onload = function() {
        document.getElementById("downloadInvoice").addEventListener("click", () => {
            const invoice = document.getElementById("invoiceTotal");
            var options = {
                margin: 0, // Adjust margin as needed
                filename: '{{ $invoice->randInvoice }}.pdf', // Set the filename to the product name
                image: {
                    type: 'jpeg',
                    quality: 5
                },
                html2canvas: {
                    scale: 5
                }, // Increase scale for higher resolution
                jsPDF: {
                    unit: 'pt',
                    format: 'letter',
                    orientation: 'portrait'
                }
            };
            html2pdf().from(invoice).set(options).save();
            // html2pdf().from(invoice).save();
        })
    }
</script>






</html>






