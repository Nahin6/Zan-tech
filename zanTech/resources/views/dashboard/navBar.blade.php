<header>
    <div class="container-fluid">
        <div class="row py-3 border-bottom">

            <div class="col-sm-4 col-lg-3 text-center text-sm-start">
                <div class="main-logo">
                    @auth
                        <a href="{{ url('redirect') }}">
                            <img src="{{ asset('images/logo/zantech logo.png') }}" alt="logo" class="img-fluid">
                        </a>
                    @else
                        <a href="{{ url('/') }}">
                            <img src="{{ asset('images/logo/zantech logo.png') }}" alt="logo" class="img-fluid">
                        </a>
                    @endauth

                </div>
            </div>

            <div class="col-sm-6 offset-sm-2 offset-md-0 col-lg-5 d-none d-lg-block">
                <div class="search-bar row bg-light p-2 my-2 rounded-4">
                    <div class="col-md-4 d-none d-md-block">
                    </div>
                    <div class="col-11 col-md-7">
                        <form id="search-form" class="text-center" action="index.html" method="post">
                            <input type="text" class="form-control border-0 bg-transparent"
                                placeholder="What are you looking for?">
                        </form>
                    </div>
                    <div class="col-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M21.71 20.29L18 16.61A9 9 0 1 0 16.61 18l3.68 3.68a1 1 0 0 0 1.42 0a1 1 0 0 0 0-1.39ZM11 18a7 7 0 1 1 7-7a7 7 0 0 1-7 7Z" />
                        </svg>
                    </div>
                </div>
            </div>

            <div
                class="col-sm-8 col-lg-4 d-flex justify-content-end gap-5 align-items-center mt-4 mt-sm-0 justify-content-center justify-content-sm-end">
                <ul class="d-flex justify-content-end list-unstyled m-0">
                    @if (Route::has('login'))
                        @auth
                            <li>
                                <a href="{{ route('userLogout') }}" id="list-color"
                                    class="rounded-circle bg-light p-2 mx-1">
                                    Logout
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('userProfile') }}" class="rounded-circle bg-light p-2 mx-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#user"></use>
                                    </svg>
                                </a>
                            </li>
                            @php
                                $totalWish = App\Models\WishlistItem::count();
                            @endphp
                            <li>
                                <a href="{{ route('viewWishList') }}"
                                    class="rounded-circle bg-light p-2 mx-1 position-relative">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#heart"></use>
                                    </svg>
                                    @if ($totalWish > 0)
                                        <span
                                            class="badge bg-red text-black position-absolute top-0 start-100 translate-middle badge-rounded-circle">{{ $totalWish }}
                                        </span>
                                    @endif
                                </a>
                            </li>

                            {{-- <li>
                                <a href="{{ route('viewWishList') }}" class="rounded-circle bg-light p-2 mx-1">
                                    <svg width="24" height="24" viewBox="0 0 24 24">
                                        <use xlink:href="#heart"></use>
                                    </svg>
                                </a>
                            </li> --}}
                        @else
                            <li>
                                <a href="{{ route('userLogin') }}" id="list-color" class="rounded-circle bg-light p-2 mx-1">
                                    Login
                                </a>
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('userRegister') }}" id="list-color"
                                    class="rounded-circle bg-light p-2 mx-1 ">
                                    Register
                                </a>
                                </a>
                            </li>
                        @endauth
                    @endif
                    <li class="d-lg-none">
                        <a href="#" class="rounded-circle bg-light p-2 mx-1 position-relative" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#cart"></use>
                            </svg>
                            <span
                            class="badge bg-red text-black position-absolute top-0 start-100 translate-middle badge-rounded-circle"> {{ ShoppingCart::count() }}
                        </span>
                        </a>
                    </li>
                    <li class="d-lg-none">
                        <a href="#" class="rounded-circle bg-light p-2 mx-1" data-bs-toggle="offcanvas"
                            data-bs-target="#offcanvasSearch" aria-controls="offcanvasSearch">
                            <svg width="24" height="24" viewBox="0 0 24 24">
                                <use xlink:href="#search"></use>
                            </svg>
                        </a>
                    </li>
                </ul>

                <div class="cart text-end d-none d-lg-block dropdown">
                    <button class="border-0 bg-transparent d-flex flex-column gap-2 lh-1" type="button"
                        data-bs-toggle="offcanvas" data-bs-target="#offcanvasCart" aria-controls="offcanvasCart">
                        @auth
                        <span class="fs-6 text-muted dropdown-toggle">{{ Auth::user()->name }} Cart</span>
                        @else
                        <span class="fs-6 text-muted dropdown-toggle">Your Cart</span>
                        @endauth

                        <span class="cart-total fs-5 fw-bold"><i class="fa-solid fa-bangladeshi-taka-sign"></i>
                            {{ ShoppingCart::total() }}</span>
                    </button>
                </div>
            </div>

        </div>
    </div>
    <div class="container-fluid">
        <div class="row py-3">
            <div class="d-flex  justify-content-center justify-content-sm-between align-items-center">
                <nav class="main-menu d-flex navbar navbar-expand-lg">

                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas"
                        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar">

                        <div class="offcanvas-header justify-content-center">
                            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"
                                aria-label="Close"></button>
                        </div>

                        <div class="offcanvas-body">
                            <!-- Categories -->
                            <select class="filter-categories border-0 mb-0 me-5 fw-bold">
                                <option>All Categories</option>
                                <option>MicroController</option>
                                <option>Motor Driver</option>
                                <option>Battery</option>
                                <option>Sensors</option>
                                <option>Project Kits</option>
                                <option>Tools</option>
                                <option>Internet Of Things</option>
                                <option>Wireless Controls</option>
                                <option>Others</option>
                            </select>

                            <ul class="navbar-nav justify-content-end menu-list list-unstyled d-flex gap-md-3 mb-0">
                                @auth
                                    <a href="{{ url('redirect') }}" class="nav-link fw-bold">Home</a>
                                @else
                                    <a href="{{ url('/') }}" class="nav-link fw-bold">Home</a>
                                @endauth
                                <li class="nav-item dropdown">
                                    <a href="#men" class="nav-link fw-bold">Robotics Package</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('showCart') }}" class="nav-link fw-bold">Cart Items</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#accessories" class="nav-link fw-bold">Popular</a>
                                </li>
                                @if (Route::has('login'))
                                    @auth
                                        <li class="nav-item">
                                            <a href="#brand" class="nav-link fw-bold">Track Order</a>
                                        </li>
                                    @endauth
                                @endif
                                <li class="nav-item">
                                    <a href="#brand" class="nav-link fw-bold">Tutorial</a>
                                </li>
                                <li class="nav-item">
                                    <a href="{{ route('loadStaticPages') }}" class="nav-link fw-bold">About us</a>
                                </li>
                                <li class="nav-item fw-bold">
                                    <a href="{{ route('loadStaticPages') }}" class="nav-link">Contact</a>
                                </li>
                            </ul>

                        </div>

                    </div>

                </nav>
            </div>
        </div>
    </div>
</header>
