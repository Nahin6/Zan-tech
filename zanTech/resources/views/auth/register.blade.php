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
    <div class="main" style="height: 700px;">
        <input type="checkbox" id="chk" aria-hidden="true">
        <div class="login">
            <h1><span class="zan">ZAN </span><span class="tech">TECH</span></h1>
            <form method="POST" class="register-form" id="login-form" action="{{ route('register') }}">
                @csrf
                <label for="chk" aria-hidden="true">Sign up</label>
                <x-input id="email" class="block mt-1 w-full" type="text" name="name" :value="old('name')"
                    placeholder="Your Name" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    placeholder="Your email" />

                <x-input id="email" class="block mt-1 w-full" type="number" name="phone" :value="old('phone')"
                    placeholder="Your Phone Number" />

                <x-input id="password" class="block mt-1 w-full InputDesign" type="password" name="password"
                    placeholder="Password" autocomplete="current-password" />
                <span id="show-password-icon"
                    style="z-index: 9999;
                position: absolute;
                top: 58.3%;
                right: 95px;"
                    onclick="togglePasswordVisibility()">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </span>
                <x-input id="re_password" class="block mt-1 w-full InputDesign" type="password"
                    name="password_confirmation" placeholder="Confirm Password" autocomplete="current-password" />
                <span id="show-password-iconn"
                    style="z-index: 9999;
                position: absolute;
                top: 67%;
                right: 95px;"
                    onclick="toggleRePasswordVisibility()">
                    <i class="fas fa-eye" aria-hidden="true"></i>
                </span>
                <x-button id="signin" class="form-submit">
                    {{ __('Register') }}
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
                    <a href="{{ route('userLogin') }}">Already have an Account?</a>
                </div>

            </form>
        </div>


    </div>
</body>
{{-- @php
 function login(Request $request){
    $exists = App\Models\User::where('phone', $request->input('phone'))->exists();

}
@endphp --}}

</html>


<script>
    const form = document.getElementById('login-form');
    const errorMessage = document.getElementById('error-message');


    form.addEventListener('submit', (event) => {
        event.preventDefault();

        // Get form inputs
        const name = document.getElementsByName('name')[0].value.trim();
        const email = document.getElementsByName('email')[0].value.trim();
        const phone = document.getElementsByName('phone')[0].value.trim();
        const password = document.getElementsByName('password')[0].value.trim();
        const confirmPassword = document.getElementsByName('password_confirmation')[0].value.trim();

        // Validate inputs
        if (name === '') {
            showError('Please enter your name');

            return;
        }


        if (email === '') {
            showError('Please enter your email');
            return;
        }

        if (!isValidEmail(email)) {
            showError('Please enter a valid email');
            return;
        }

        if (phone === '') {
            showError('Please enter your phone number');
            return;
        }

        if (!isValidPhone(phone)) {
            showError('Please enter a valid phone number');
            return;
        }

        if (password === '') {
            showError('Please enter a password');
            return;
        }

        if (password.length < 8) {
            showError('Password must be at least 8 characters long');
            return;
        }

        if (confirmPassword === '') {
            showError('Please confirm your password');
            return;
        }

        if (password !== confirmPassword) {
            showError('Passwords do not match');

            return;
        }
        // if (phone == $exists) {
        //     showError('Phone number already exists');

        //     return;
        // }
        // Check for duplicate phone number
        // const phoneExists = await checkDuplicate('phone', phone);
        // if (phoneExists) {
        //     showError('Phone number already exists');
        //     return;
        // }

        // If all inputs are valid, submit the form
        form.submit();
    });
    //password show
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

    function toggleRePasswordVisibility() {
        const RepasswordInput = document.getElementById("re_password");
        const ReshowPasswordIcon = document.getElementById("show-password-iconn");

        if (RepasswordInput.type === "password") {
            RepasswordInput.type = "text";
            ReshowPasswordIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            RepasswordInput.type = "password";
            ReshowPasswordIcon.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }


    function showError(message) {

        errorMessage.textContent = message;
        errorMessage.style.display = 'block';
    }

    function isValidEmail(email) {
        const pattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return pattern.test(email);
    }

    function isValidPhone(phone) {
        const pattern = /^\d{11}$/;
        return pattern.test(phone);
    }

    function showError(message) {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
        errorMessage.textContent = message;
        errorMessage.style.display = 'block';
        errorMessage.scrollIntoView({
            behavior: 'smooth'
        });

        setTimeout(() => {
            errorMessage.style.display = 'none';
        }, 4000);
    }
</script>
