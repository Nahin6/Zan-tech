@extends('admin.adminDashboard')


@section('content')

<div class="container ms-lg-5-5">

    @include('sweetalert::alert')
    <h1 class="text-center">Add New Promo Codes</h1>
    <form action="{{ route('addNewPromoCodes') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Promo code Name</label>
            <input type="text" class="form-control" name="promoName" id="">
            @error('promoName')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">discount amount</label>
            <input type="number" class="form-control" name="promoDiscount" id="">
            @error('promoDiscount')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="text-center mb-5">
            <button type="submit" class="btn btn-primary mx-auto">Add Promo Code</button>
        </div>
    </form>
</div>

<h1 class="text-center mt-5">Promo Code List</h1>
<div class="table-responsive">
    <table class="table m-3">
        <thead>
            <tr>
                <th scope="col">Promo Code Name</th>
                <th scope="col">Promo Code Discount</th>
                <th scope="col">Edit Promo codes</th>
                <th scope="col">Delete Promo Codes</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($promoCodes as $promoCode)
                <tr>
                    <th>{{ $promoCode->promo_code }}</th>
                    <td>{{ $promoCode->discount }}</td>

                    <td><a type="button" href="{{ route('editPromoCode', $promoCode->id) }}"
                           class="btn btn-primary btn-sm btn-danger">Edit</a></td>
                    <td><a type="button" href="{{ route('deletePromoCode', $promoCode->id) }}"
                        onClick="return confirm('Are you sure')"      class="btn btn-primary btn-sm btn-danger">Delete</a></td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
