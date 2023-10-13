{{-- @include('admin.adminLinks') --}}
@include('admin.adminLinks')
@include('admin.adminNavbar')

@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container ms-lg-5-5">
    @include('sweetalert::alert')
    <h1 class="text-center">Update Product</h1>
    <form action="{{ route('updateProducts', $editProducts->id) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Title</label>
            <input type="text" class="form-control" name="productName" id=""
                value="{{ $editProducts->productName }}">
            @error('productName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Catagory</label>
            <select name="catagory" class="form-control" id="">
                @foreach ($category as $category)
                    <option value="{{ $category->catagoryName }}" @if ($category->catagoryName === $editProducts->catagory) selected @endif>
                        {{ $category->catagoryName }}</option>
                @endforeach
            </select>

            @error('catagory')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Short Details</label>
            <input type="text" class="form-control" name="shortDetails" id=""
                value="{{ $editProducts->shortDetails }}">
            @error('shortDetails')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Long Details</label>
            <textarea class="form-control" id="" name="longDetails" rows="3">{{ $editProducts->longDetails }}</textarea>
            @error('longDetails')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div>
            <label for="formFileLg" class="form-label">Upload Image</label>
            <input class="form-control form-control-lg" name="productImg" id="formFileLg" type="file">
            @error('productImg')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Price</label>
            <input type="number" class="form-control" name="productPrice" id=""
                value="{{ $editProducts->productPrice }}">
            @error('productPrice')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="productQuantity" id=""
                value="{{ $editProducts->productQuantity }}">
            @error('productQuantity')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary mx-auto">Update Product</button>
        </div>
    </form>
</div>
