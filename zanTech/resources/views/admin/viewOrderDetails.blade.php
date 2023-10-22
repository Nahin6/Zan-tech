@extends('admin.adminDashboard')

@section('content')
    @if ($message = Session::get('success'))
        <div id="success-message" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container ms-lg-5-5">
        <h1 class="text-center">Order List</h1>
        {{-- <div class="m-3">
        <p class="text-center">Product Search</p>
        <form class="d-flex" role="search" method="GET" action="{{ route('searchProducts') }}">
            <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search Product</button>
        </form>

    </div> --}}

        <div class="table-responsive">
            <table class="table m-3">
                <thead>
                    <tr>
                        <th scope="col">Customer Name</th>
                        <th scope="col">Division</th>
                        <th scope="col">City</th>
                        <th scope="col">Street no</th>
                        <th scope="col">House no</th>
                        <th scope="col">Customer Number</th>
                        <th scope="col">Customer Email</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Product Quantity</th>
                        <th scope="col">Product Total Price</th>
                        <th scope="col">Delivery on</th>
                        <th scope="col">Order Status</th>
                        <th scope="col">Order Invoice</th>
                        <th scope="col">Dowload Invoice</th>
                        <th scope="col">Update Order Status</th>
                        <th scope="col">Delete Order</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderItems as $item)
                        <tr>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->customerName }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->customerDivision }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->customerCity }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->customerStreetAdress }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->customerHomeAdress }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->customerPhone }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->customerEmail }}
                                @endif
                            </td>
                            <td>{{ $item->productName }}</td>
                            <td>{{ $item->productQuantity }}</td>
                            <td>{{ $item->productPrice }}</td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->deliveryCharge }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->randInvoice }}
                                @endif
                            </td>
                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    {{ $item->orderStatus }}
                                @endif
                            </td>

                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    <a type="button" href="{{ route('downloadPdf', $item->id) }}"
                                        class="btn btn-primary btn-sm btn-success">Download Invoice</a>
                                @endif
                            </td>
                            <td>
                                <div class="btn-group">
                                    @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                        @if ($item->orderStatus == 'Delivered')
                                            <button type="button" class="btn btn-success dropdown-toggle" disabled
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Status
                                            </button>
                                        @else
                                            <button type="button" class="btn btn-success dropdown-toggle"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Status
                                            </button>
                                        @endif
                                    @endif
                                    <div class="dropdown-menu">
                                        <a class="dropdown-item"
                                            href="{{ route('UpdateOrderToPending', $item->id) }}">Pending</a>
                                        <a class="dropdown-item" href="{{ route('UpdateOrderToProcess', $item->id) }}">On
                                            Process</a>
                                        <a class="dropdown-item" href="{{ route('OutForDelivery', $item->id) }}">Out for
                                            delivery</a>
                                        <a class="dropdown-item"
                                            href="{{ route('UpdateOrderToDelivered', $item->id) }}">Delivered</a>
                                        <a class="dropdown-item"
                                            href="{{ route('UpdateOrderToNotAvailable', $item->id) }}">Product not
                                            available</a>
                                    </div>
                                </div>
                            </td>

                            <td>
                                @if ($loop->first || $item->orderId != $orderItems[$loop->index - 1]->orderId)
                                    <a type="button" href="{{ route('deleteOrder', $item->id) }}"
                                        onClick="return confirm('Are you sure')"
                                        class="btn btn-primary btn-sm btn-danger">Delete</a>
                                @endif
                            </td>
                        </tr>
                        @if ($loop->last || $item->orderId != $orderItems[$loop->index + 1]->orderId)
                            <tr>
                                <td colspan="30">
                                    <hr>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
