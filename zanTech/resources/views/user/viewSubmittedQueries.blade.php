@include('dashboard.links')
@include('dashboard.topNav')
@include('dashboard.navBar')
@include('sweetalert::alert')

@if ($cusQuery->isEmpty())
<section class="py-5 mb-5" style="background: url(images/Banner/background-pattern.png);">
    <div class="container-fluid">
        <div class=" text-center">
            <h1 class="page-title pb-2 ">No feedack</h1>
        </div>
        <h2 class="page-title pb-2 text-center">Your complain box is empty</h2>
    </div>
</section>
@else
<h3 class="mt-xxl-5 mb-lg-5 text-center">View Feedback</h3>
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Your Complain subject</th>
                <th scope="col">Details message</th>
                <th scope="col">Status</th>
                <th scope="col">Received Feedback</th>
                <th scope="col">Delete complain</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($cusQuery as $queries)
                <tr>
                    <td>{{ $queries->customerQuerySubject }}</td>
                    <td>{{ $queries->customerDetailsMessage }}</td>
                    <td>{{ $queries->queryStatus }}</td>
                    @if ($queries->feedback)
                        <td>{{ $queries->feedback }}</td>
                    @else
                        <td>No Feedback yet</td>
                    @endif
                    <td>
                        <a href="{{ route('deleteQuery', $queries->id) }}" type="button"
                            onClick="return confirm('Are you sure')"
                            class="btn btn-dark fw-bold rounded-pill">Delete</a>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>
@endif
@include('dashboard.footer')
