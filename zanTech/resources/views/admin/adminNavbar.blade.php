<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bootstrap 5 Side Bar Navigation</title>
    <!-- bootstrap 5 css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous" />
    <!-- BOX ICONS CSS-->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet" />
    <!-- custom css -->
    {{-- <link rel="stylesheet" href="css/adminNav.css" /> --}}
</head>

<body>
    <!-- Side-Nav -->
    <div class="side-navbar active-nav d-flex justify-content-between flex-wrap flex-column" id="sidebar">
        <ul class="nav flex-column text-white w-100 fw-bold mt-2">
            <a href="{{url('redirect')   }}" class="nav-link h3 text-white my-2">
                ZAN </br>Tech
            </a>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ route('addCatagoryPage') }}">Add Catagory</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ route('addProductPage') }}">Add Product</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ route('ViewProductList') }}">Product List</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ route('OrderList')  }}">Order List</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ route('userInformation') }}">User Details</a>
            </li>
            <li class="nav-item mt-2">
                <a class="nav-link" href="{{ route('customerQueries') }}">Customer Complains</a>
            </li>
            <li class="nav-item  mt-2">
                <a class="nav-link" href="{{ route('userLogout') }}">Logout</a>
            </li>
        </ul>


    </div>

    <!-- Main Wrapper -->
    <div class="p-1 my-container active-cont">
        <!-- Top Nav -->
        <nav class="navbar top-navbar navbar-light bg-light px-5">
            <a class="btn border-0" id="menu-btn"><i class="bx bx-menu"></i></a>
        </nav>
        <!--End Top Nav -->

    </div>

    <!-- bootstrap js -->
   <script src="{{ asset('js') }}/adminNav.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>
</body>

</html>
