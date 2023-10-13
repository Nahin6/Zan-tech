{{-- <x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-button class="ml-4">
                    {{ __('Log in') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    {{-- <link rel="stylesheet" href="template/assets/css/LoginSignUp/LoginSignUp.css"> --}}
    <link rel="stylesheet" href="css/LoginSignUp/LoginSignUp.css">
    <link rel="stylesheet"
        href="css/LoginSignUp/fonts/material-icon/css/material-design-iconic-font.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body>

    @include('sweetalert::alert')
    <div class="main">

        <section class="sign-in">
            <div class="container">
           
                <div class="error-message" id="error-message"></div>

             
                <div class="signin-content">

                    <div class="signin-image">
                        <figure><img src="{{ asset('images/login.png') }}" alt="sing up image"></figure>
                        <a href="{{ route('userRegister') }}" class="signup-image-link">Dont have an account?</a>
                    </div>
                    <div class="signin-form">
                        @if ($errors->any())
                            <div class="alert alert-danger" id="error-message">
                                @foreach ($errors->all() as $error)
                                    <p class="errorMessage">{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif
                        <h2 class="form-title">Sign in</h2>
                        <form method="POST" class="register-form" id="login-form"
                            action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                            @csrf

                            <div class="form-group">
                                <x-input id="email" class="block mt-1 w-full" type="email" name="email"
                                    :value="old('email')" placeholder="Your email" />

                            </div>

                            <div class="form-group">

                                <x-input id="password" class="block mt-1 w-full InputDesign" type="password"
                                    name="password" placeholder="Password" autocomplete="current-password" />
                                <span id="show-password-icon" class="ShowHidePass" onclick="togglePasswordVisibility()">
                                    <i class="fas fa-eye" aria-hidden="true"></i>
                                </span>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term" />
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember
                                    me</label>
                            </div>
                            <div class="form-group form-button">
                                <x-button id="signin" class="form-submit">
                                    {{ __('Log in') }}
                                </x-button>

                            </div>
                            <div class="form-group form-button">
                                <a href="{{ route('password.request') }}" class="signup-image-link">Forgot your
                                    password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script>
        // Get the form and error message elements
        var form = document.querySelector('form');
        var errorMessage = document.querySelector('#error-message');

        form.addEventListener('submit', function(event) {
            // Prevent the form from submitting
            event.preventDefault();

            // Get the email and password values
            var email = document.querySelector('#email').value;
            var password = document.querySelector('#password').value;

            // Validate the email and password values
            if (email === '' && password === '') {
                // Show the error message
                errorMessage.textContent = 'Please enter both email and password.';
                errorMessage.style.display = 'block';
            } else if (email === '') {
                // Show the error message
                errorMessage.textContent = 'Please enter your email.';
                errorMessage.style.display = 'block';
            } else if (password === '') {
                // Show the error message
                errorMessage.textContent = 'Please enter your password.';
                errorMessage.style.display = 'block';
            } else {
                // Submit the form if the email and password are not empty
                form.submit();
            }

            // Set a timer of 3 seconds to hide the error message
            setTimeout(function() {
                errorMessage.style.display = 'none';
            }, 3000);
        });

        function togglePasswordVisibility() {
            const passwordInput = document.getElementById("password");
            const showPasswordIcon = document.getElementById("show-password-icon");

            if (passwordInput.type === "password") {
                passwordInput.type = "text";
                showPasswordIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
            } else {
                passwordInput.type = "password";
                showPasswordIcon.innerHTML = '<i class="fas fa-eye"></i>';
            }
        }
    </script>


</body>

</html>
