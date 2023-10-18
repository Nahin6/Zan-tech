@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')
@include('sweetalert::alert')


@if ($orderItems->isEmpty())
<section class="py-5 mb-5" style="background: url(images/Banner/background-pattern.png);">
    <div class="container-fluid">
        <div class=" text-center">
            <h1 class="page-title pb-2 ">Nothing to track</h1>
        </div>
        <h2 class="page-title pb-2 text-center">You don't have any order ongoing</h2>
    </div>
</section>
@else
<h3 class="mt-xxl-5 mb-lg-5 text-center">Your Order History</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Product Name</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Delivery Charge</th>
                <th scope="col">Order Status</th>
                <th scope="col">Download Invoice</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($orderItems as $item)
                @php
                    $charge = 0;

                    if ($item->deliveryCharge == 'insideDhaka') {
                        $charge = 60;
                    } elseif ($item->deliveryCharge == 'outsideDhaka') {
                        $charge = 120;
                    } else {
                        $charge = 0;
                    }
                @endphp

                <tr>
                    <td>{{ $item->productName }}</td>
                    <td>{{ $item->productQuantity }}</td>
                    <td>{{ $item->productPrice }}</td>
                    <td>{{ $charge }}</td>
                    <td>{{ $item->orderStatus }}</td>
                    <td>
                        @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                        <a href="{{ route('downloadPdf', $item->id) }}" type="button"
                        class="btn btn-dark fw-bold rounded-pill">Download</a>
                        @endif
                    </td>
                </tr>

                @if ($loop->last || $item->orderId != $orderItems[$loop->index + 1]->orderId)
                    <tr>
                        <td colspan="8">
                            <hr>
                        </td>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endif
@include('dashboard.footer')
    {{-- <tbody>
        @foreach ($orderItems as $item)
            @php
                $charge = 0;

                if ($item->deliveryCharge == 'insideDhaka') {
                    $charge = 60;
                } elseif ($item->deliveryCharge == 'outsideDhaka') {
                    $charge = 120;
                } else {
                    $charge = 0;
                }
            @endphp
            @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                <tr>
                    <td>{{ $item->productName }}</td>
                    <td>{{ $item->productQuantity }}</td>
                    <td>{{ $item->productPrice }}</td>
                    <td>{{ $charge }}</td>
                    <td>{{ $item->orderStatus }}</td>
                    <td>
                        <a href="{{ route('downloadPdf', $item->id) }}" type="button"
                            class="btn btn-dark fw-bold rounded-pill">Download</a>
                    </td>
                </tr>

                @elseif ($loop->first || $item->orderId != $orderItems[$loop->index +1]->orderId)
                    <tr>
                        <td colspan="5">
                            <hr>
                        </td>
                    </tr>
                @endif
            @endforeach

    </tbody> --}}
