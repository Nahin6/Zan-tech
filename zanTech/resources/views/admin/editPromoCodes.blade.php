@extends('admin.adminDashboard')

@section('content')

<div class="container ms-lg-5-5">

    @include('sweetalert::alert')
    <h1 class="text-center">Update Promo Codes</h1>
    <form action="{{ route('updatePromoCodes',$promos->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Promo code Name</label>
            <input type="text" class="form-control" name="promoName" value=" {{ $promos->promo_code }}">
            @error('promoName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">discount amount</label>
            <input type="number" class="form-control" name="promoDiscount" value="{{ $promos->discount }}">
            @error('promoDiscount')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary mx-auto">Update Promo Code</button>
        </div>
    </form>
</div>
@endsection
