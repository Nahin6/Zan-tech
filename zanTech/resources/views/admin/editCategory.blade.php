@extends('admin.adminDashboard')

@section('content')

@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>

@endif
<div class="container ms-lg-5-5">

    @include('sweetalert::alert')
    <h1 class="text-center">Update Catagory</h1>
    <form action="{{ route('updateCategory', $editCategory->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Catagory Name</label>
            <input type="text" class="form-control" name="catagoryName" value="{{ $editCategory->catagoryName }}" id="">
            @error('catagoryName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary mx-auto">Update Catagory Name</button>
        </div>
    </form>
</div>
@endsection
