@include('admin.adminLinks')
@include('admin.adminNavbar')


@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>

@endif
<div class="container ms-lg-5-5">
    @include('sweetalert::alert')

    <h1 class="text-center">Add New Product</h1>
    <form action="{{ route('addProducts') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Title</label>
            <input type="text" class="form-control" name="productName" id="">
            @error('productName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Catagory</label>
            <select name="catagory" class="form-control" id="">
                {{-- <option value="" disabled selected>Select Catagory</option> --}}
                @foreach ($category as $category )
                <option value="{{ $category->catagoryName }}">{{ $category->catagoryName }}</option>
                @endforeach
            </select>
            @error('catagory')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>


        {{-- <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Product Catagory</label>
            <select name="catagory" class="form-control" id="">
                <option value="" disabled selected>Select Catagory</option>
                <option value="Microcontroller">Microcontroller</option>
                <option value="motor Driver">motor Driver</option>
                <option value="ESC">ESC</option>
                <option value="Motor">Motor</option>
                <option value="Battery">Battery</option>
                <option value="Sensors">Sensors</option>
                <option value="Project Kits">Project Kits</option>
                <option value="Tools">Tools</option>
                <option value="Internet Of Things">Internet Of Things</option>
                <option value="Wireless Controls">Wireless Controls</option>
            </select>
            @error('catagory')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div> --}}
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Short Details</label>
            <input type="text" class="form-control" name="shortDetails" id="">
            @error('shortDetails')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Long Details</label>
            <textarea class="form-control" id="" name="longDetails" rows="3"></textarea>
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
            <input type="number" class="form-control" name="productPrice" id="">
            @error('productPrice')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Quantity</label>
            <input type="number" class="form-control" name="productQuantity" id="">
            @error('productQuantity')
            <div class="text-danger">{{ $message }}</div>
        @enderror
        </div>
        <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary mx-auto">Add New Product</button>
        </div>
    </form>
</div>
{{-- </div> --}}
