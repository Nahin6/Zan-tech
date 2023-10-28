<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/login.css') }}">
    <link rel="icon" type="image/x-icon" href="{{ asset('images\logo\favicon\zan-tech-favicon.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
</head>

<body style="background-image:url({{ asset('images/log-bg.png') }});">
    <div class="main">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="login">
            <h1><span class="zan">ZAN </span><span class="tech">TECH</span></h1>
            <form method="POST" class="register-form" id="login-form"
                action="{{ isset($guard) ? url($guard . '/login') : route('login') }}">
                @csrf
                <label for="chk" aria-hidden="true">Login</label>
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    placeholder="Your email" />
                <x-input id="password" class="block mt-1 w-full InputDesign" type="password" name="password"
                    placeholder="Password" autocomplete="current-password" />
                <span id="show-password-icon" class="ShowHidePass" onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </span>
                <x-button id="signin" class="form-submit">
                    {{ __('Log in') }}
                </x-button>
                <div class="error-message" id="error-message"></div>
                @if ($errors->any())
                    <div class="alert alert-danger" id="error-message">
                        @foreach ($errors->all() as $error)
                            <p class="errorMessage">{{ $error }}</p>
                        @endforeach
                    </div>
                @endif
                <div>
                    <a href="#">forgot password</a>
                    <br>
                    <a href="{{ route('userRegister') }}">Dont have Account?</a>
                </div>

            </form>
        </div>

        <div class="signup">


            {{-- <a class="btn" href="{{ route('userRegister') }}">Sign up</a>       --}}
        </div>
    </div>
</body>

</html>


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

            errorMessage.textContent = 'Please enter both email and password.';
            errorMessage.style.display = 'block';
        } else if (email === '') {

            errorMessage.textContent = 'Please enter your email.';
            errorMessage.style.display = 'block';
        } else if (password === '') {

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
