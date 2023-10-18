@include('admin.adminLinks')
@include('admin.adminNavbar')
@include('sweetalert::alert')

@if ($message = Session::get('success'))
    <div id="success-message" class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif
<div class="container ms-lg-5-5">
    <h1 class="text-center">Customer Complain/Query</h1>

    <div class="table-responsive">
        <table class="table m-3">
            <thead>
                <tr>
                    <th scope="col">Customer Name</th>
                    <th scope="col">Customer Number</th>
                    <th scope="col">Customer Email</th>
                    <th scope="col">Subject</th>
                    <th scope="col">Details Message</th>
                    <th scope="col">Status</th>
                    <th scope="col">Give Feedback</th>
                    <th scope="col">Delete complain</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($query as $queries )
                <tr>
                    <td>{{ $queries ->customerName }}</td>
                    <td>{{ $queries ->customerPhone }}</td>
                    <td>{{ $queries ->customerEmail }}</td>
                    <td>{{ $queries ->customerQuerySubject }}</td>
                    <td>{{ $queries ->customerDetailsMessage }}</td>
                    <td>{{ $queries ->queryStatus }}</td>
                    @if ($queries ->feedback)
                    <td>Problem solved</td>
                    @else
                    <td>
                        <form method="POST" id="form" action="{{ route('submitSolToQuery', $queries->id) }}"
                        class="form-group flex-wrap" enctype="multipart/form-data">
                        @csrf
                        <input type="text" name="solutionToCustomer" placeholder="give feedback" d="adr" style="max-width: 159px"  class="form-control ps-3">
                        <div class="d-grid" style="max-width: 159px ;">
                            <button type="submit"
                                class="btn btn-primary  text-uppercase btn-rounded-none">Submit</button>
                        </div>
                        </form>
                    </td>
                    @endif

                    <td>
                        <a type="button"  href="{{ route('deleteOrder',$queries ->id) }}"
                        c  class="btn btn-primary btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>
</div>
