@include('admin.adminLinks')
@include('admin.adminNavbar')
{{-- <div class=" p-1 my-container active-cont"> --}}

@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container m-3">
    <h1 class="text-center">Product List</h1>
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

                    <th scope="col">Product ID</th>
                    <th scope="col">Product Title</th>
                    <th scope="col">Product price</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Image</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $product)
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
    {{-- Category table --}}
    <h1 class="text-center mt-5">Total Category List</h1>
    <div class="table-responsive">
        <table class="table m-3">
            <thead>
                <tr>

                    <th scope="col">Category ID</th>
                    <th scope="col">Category Name</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($category as $product)
                    <tr>
                        <th>{{ $product->id }}</th>
                        <td>{{ $product->catagoryName }}</td>
                        <td><a type="button" href="{{ route('deleteCategory', $product->id) }}"
                                class="btn btn-primary btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
