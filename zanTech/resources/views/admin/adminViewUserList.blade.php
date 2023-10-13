@include('admin.adminLinks')
@include('admin.adminNavbar')
{{-- <div class=" p-1 my-container active-cont"> --}}

@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container m-3">
    <h1 class="text-center">Total User List</h1>


    <div class="table-responsive">
        <table class="table m-3">
            <thead>
                <tr>
                    <th scope="col">Coustomer ID</th>
                    <th scope="col">Coustomer Name</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Email</th>
                    <th scope="col">Remove</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $users)
                    <tr>

                        <th>{{ $users->id }}</th>
                        <td>{{ $users->name }}</td>
                        <td>{{ $users->phone }}</td>
                        <td>{{ $users->email }}</td>
                        <td><a type="button" href="{{ route('deleteUser', $users->id) }}"
                                class="btn btn-primary btn-sm btn-danger">Delete</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
