@extends('admin.adminDashboard')

@section('content')
    @if ($message = Session::get('success'))
        <div id="success-message" class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="container ms-lg-5-5">
        <h1 class="text-center">Project List</h1>
        <div class="table-responsive">
            <table class="table m-3">
                <thead>
                    <tr>

                        <th scope="col">Project ID</th>
                        <th scope="col">Project Title</th>
                        <th scope="col">Project price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Image</th>
                        <th scope="col"></th>
                        <th scope="col"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($project as $product)
                        <tr>

                            <th>{{ $product->id }}</th>
                            <td>{{ $product->productName }}</td>
                            <td>{{ $product->productPrice }}</td>
                            <td>{{ $product->productQuantity }}</td>
                            <td><img src="public/product_images/{{ $product->productImg }}" style="height: 50px;"
                                    alt="..."></td>
                            <td><a type="button" href="{{ route('editProduct', $product->id) }}"
                                    class="btn btn-primary btn-sm">Edit</a></td>
                            <td><a type="button" href="{{ route('deleteProduct', $product->id) }}"
                                    class="btn btn-primary btn-sm btn-danger">Delete</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
@endsection
