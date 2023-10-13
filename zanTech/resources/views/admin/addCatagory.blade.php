@include('admin.adminLinks')
@include('admin.adminNavbar')

@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>

@endif
<div class="container ms-lg-5-5">

    @include('sweetalert::alert')
    <h1 class="text-center">Add New Catagory</h1>
    <form action="{{ route('addNewCatagory') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Catagory Name</label>
            <input type="text" class="form-control" name="catagoryName" id="">
            @error('catagoryName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary mx-auto">Add New Catagory</button>
        </div>
    </form>
</div>
{{-- </div> --}}
