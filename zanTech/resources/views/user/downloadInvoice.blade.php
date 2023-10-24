
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">


    <title>Zan-tech</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Link cdn  Awesome Font-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <!-- facicon -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <style type="text/css">
        body {
            margin-top: 20px;
            color: #484b51;
        }

        .text-secondary-d1 {
            color: #728299 !important;
        }

        .page-header {
            margin: 0 0 1rem;
            padding-bottom: 1rem;
            padding-top: .5rem;
            border-bottom: 1px dotted #e2e2e2;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-pack: justify;
            justify-content: space-between;
            -ms-flex-align: center;
            align-items: center;
        }

        .page-title {
            padding: 0;
            margin: 0;
            font-size: 1.75rem;
            font-weight: 300;
        }

        .brc-default-l1 {
            border-color: #dce9f0 !important;
        }

        .ml-n1,
        .mx-n1 {
            margin-left: -.25rem !important;
        }

        .mr-n1,
        .mx-n1 {
            margin-right: -.25rem !important;
        }

        .mb-4,
        .my-4 {
            margin-bottom: 1.5rem !important;
        }

        hr {
            margin-top: 1rem;
            margin-bottom: 1rem;
            border: 0;
            border-top: 1px solid rgba(0, 0, 0, .1);
        }

        .text-grey-m2 {
            color: #888a8d !important;
        }

        .text-success-m2 {
            color: #86bd68 !important;
        }

        .font-bolder,
        .text-600 {
            font-weight: 600 !important;
        }

        .text-110 {
            font-size: 110% !important;
        }

        .text-blue {
            color: #478fcc !important;
        }

        .pb-25,
        .py-25 {
            padding-bottom: .75rem !important;
        }

        .pt-25,
        .py-25 {
            padding-top: .75rem !important;
        }

        .bgc-default-tp1 {
            background-color: rgba(15, 37, 162, 0.92) !important;
        }

        .bgc-default-l4,
        .bgc-h-default-l4:hover {
            background-color: #f3f8fa !important;
        }

        .page-header .page-tools {
            -ms-flex-item-align: end;
            align-self: flex-end;
        }

        .btn-light {
            color: #757984;
            background-color: #f5f6f9;
            border-color: #dddfe4;
        }

        .w-2 {
            width: 1rem;
        }

        .text-120 {
            font-size: 120% !important;
        }

        .text-primary-m1 {
            color: #4087d4 !important;
        }

        .text-danger-m1 {
            color: #dd4949 !important;
        }

        .text-blue-m2 {
            color: #68a3d5 !important;
        }

        .text-150 {
            font-size: 150% !important;
        }

        .text-60 {
            font-size: 60% !important;
        }

        .text-grey-m1 {
            color: #7b7d81 !important;
        }

        .align-bottom {
            vertical-align: bottom !important;
        }

        .item-divider {
            border-bottom: 2px solid #ddd;
            /* Add your desired border style here */
        }
        .footer{
            /* text-decoration: underline; */
            padding: 30px;
            color: #04066b;
            font-size: 18px;
            padding-bottom: 5px;
        }
    </style>
</head>

<body>
    <div class="page-content container">
        @foreach ($orderInvoice as $invoice)
            @php
                $discount = ($invoice->totalBill / 100) * $invoice->customerPromoDiscount;
                $finalBIll = $invoice->totalBill - $discount;
            @endphp
        @endforeach
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    NO: {{ $invoice->randInvoice }}
                </small>
            </h1>
            <div class="page-tools">
                <div class="action-buttons">
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" onclick="printPage()"
                        data-title="Print">
                        <i class="mr-1 fa fa-print text-primary-m1 text-120 w-2"></i>
                        Print
                    </a>
                    <a class="btn bg-white btn-light mx-1px text-95" href="#" id="downloadInvoice"
                        data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        PDF
                    </a>
                </div>
            </div>
        </div>
        <div class="container px-0" id="invoiceTotal">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <img src="{{ asset('images/zanPdfLogo.png') }}" alt="code logo">
                                <span class="text-default-d3">ZAN Tech</span>
                            </div>
                        </div>
                    </div>

                    <hr class="row brc-default-l1 mx-n1 mb-4" />
                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">To:</span>
                                <span
                                    class="text-600 text-110 text-blue align-middle">{{ $orderInvoice[0]->customerName }}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    {{ $orderInvoice[0]->customerCity }}
                                </div>
                                <div class="my-1">
                                    Street no :{{ $orderInvoice[0]->customerStreetAdress }}
                                </div>
                                <div class="my-1">
                                    House no :{{ $orderInvoice[0]->customerHomeAdress }}
                                </div>
                                <div class="my-1"><i class="fa fa-phone fa-flip-horizontal text-secondary"></i> <b
                                        class="text-600">{{ $orderInvoice[0]->customerPhone }}</b></div>
                            </div>
                        </div>

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">NO:</span> {{ $invoice->randInvoice }}</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Issue Date:</span>
                                    {{ \Carbon\Carbon::parse($invoice->created_at)->format('Y-m-d') }}</div>
                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Status:</span> <span
                                        class="badge badge-warning badge-pill px-25">Unpaid</span></div>
                            </div>
                        </div>

                    </div>
                    <div class="mt-4">
                        <div class="row text-600 text-white bgc-default-tp1 py-25">
                            {{-- <div class="col-2 text-center">NO</div> --}}
                            <div class="col-5 text-center"> ITEM NAME</div>
                            <div class="col-2 text-center">PRICE</div>
                            <div class="col-2 text-center">QUANTITY</div>
                            <div class="col-1 text-center">TOTAL</div>
                        </div>
                        {{-- @php
                            $i = 1;
                        @endphp --}}

                        @foreach ($orderInvoice as $invoice)
                            <div class="text-95 text-secondary-d3">
                                <div class="row mb-2 mb-sm-0 py-25 item-divider">
                                    {{-- <div class="col-2 text-center">{{ $i++ }}</div> --}}
                                    <div class="col-5 text-center">{{ $invoice->productName }}</div>
                                    <div class="col-2 text-center">{{ $invoice->singleProductPrice }}</div>
                                    <div class="col-2 text-95 text-center">{{ $invoice->productQuantity }}</div>
                                    <div class="col-1 text-secondary-d2 text-center">
                                        {{ $invoice->singleProductPrice * $invoice->productQuantity }}
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- price section --}}
                    <div class="row border-b-2 brc-default-l2"></div>
                    <div class="row mt-3">
                        <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                           {{-- empty --}}
                        </div>
                        <div class="col-12 col-sm-5 text-grey text-90 order-first order-sm-last">
                            @if ($invoice->deliveryCharge!='pickupPoint')
                            <div class="row my-2">
                                <div class="col-7 text-right font-weight-bold">
                                    Delivery Charge
                                </div>
                                <div class="col-5">
                                    @if ($invoice->deliveryCharge == 'insideDhaka')
                                        <span class="text-120 text-secondary-d1">60 <i
                                                class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                    @elseif ($invoice->deliveryCharge == 'outsideDhaka')
                                        <span class="text-120 text-secondary-d1">120 <i
                                                class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                    @endif
                                </div>
                            </div>
                            @endif
                            <div class="row my-2">
                                <div class="col-7 text-right font-weight-bold">
                                    Sub Total
                                </div>
                                <div class="col-5">
                                    <span class="text-120 text-secondary-d1">{{ $invoice->totalBill }} <i
                                            class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                            </div>
                            @if ($invoice->customerPromoCode)
                            <div class="row my-2">
                                <div class="col-7 text-right font-weight-bold">
                                    Discount ({{ $invoice->customerPromoDiscount }}%)
                                </div>
                                <div class="col-5">
                                    <span class="text-110 text-secondary-d1">-{{ number_format($discount, 0) }} <i
                                            class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                            </div>
                            @endif
                            <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                <div class="col-7 text-right font-weight-bold">
                                    Total Amount
                                </div>
                                <div class="col-5">
                                    <span class="text-150 text-success-d3 opacity-2">{{ number_format($finalBIll) }}
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i></span>
                                </div>
                            </div>
                        </div>

                    </div>
                    <hr />
                    <div>

                            <p class="text-primary-m1">For any query :</p>
                            <p class="text-primary-m1">Phone: 01619996782,01627199815</p>
                            <p class="text-primary-m1">Email: zantechbd@gmail.com</p>

                        {{-- <a href="#" class="btn btn-info btn-bold px-4 float-right mt-3 mt-lg-0">Pay Now</a> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.3/html2pdf.bundle.min.js"></script>
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
                    margin: 45, // Adjust margin as needed
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

        function printPage() {
            window.print();
        }
    </script>
</body>

</html>
