@extends('dashboard.dashboard')

@section('content')
<div class="d-flex justify-content-center align-items-center m-3">
    <div class="">
        <h4>Profile Information</h4>
        <p>Update you profile information and email address</p>
        <form action="{{ route('updateNameEmail') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-11">
                    <input type="text" minlength="2" name="updateName" id="adr" value="{{ Auth::user()->name }}"
                        placeholder="Name" class="form-control" required>
                    <input class="form-control mt-4 mb-4" type="email" id="adr"
                        value="{{ Auth::user()->email }}" name="updateEmail" placeholder="E-mail" required>
                    <input class="form-control mt-4 mb-4" type="number" id="adr"
                        value="{{ Auth::user()->phone }}" name="updatePhone" placeholder="Phone number" required>
                    <button type="submit" name="submit" class="btn btn-dark">Save</button>
                </div>
            </div>
        </form>

        <h4 class="pt-4">Update password</h4>

        <form action="{{ route('updatePassword') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-11">
                    <div class="input-container">
                        <input id="current-password" class="form-control" type="password" name="currentPassword" placeholder="Password" autocomplete="current-password" />
                        <span id="show-current-password-icon" class="ShowHidePass show-password-icon" onclick="togglePasswordVisibility('current-password', 'show-current-password-icon')">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="input-container">
                        <input id="new-password" class="form-control mt-4 mb-4" type="password" name="NewPassword" placeholder="New password" autocomplete="current-password" />
                        <span id="show-new-password-icon" class="ShowHidePass show-password-icon" onclick="togglePasswordVisibility('new-password', 'show-new-password-icon')">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>
                    <div class="input-container">
                        <input id="confirm-password" class="form-control mt-4 mb-4" type="password" name="ConfirmPassword" placeholder="confirm password" autocomplete="current-password" />
                        <span id="show-confirm-password-icon" class="ShowHidePass show-password-icon" onclick="togglePasswordVisibility('confirm-password', 'show-confirm-password-icon')">
                            <i class="fas fa-eye" aria-hidden="true"></i>
                        </span>
                    </div>



                    {{-- <input class="form-control mt-4 mb-4" minlength="8" id="adr" type="password" name="NewPassword"
                        placeholder="New password" required>

                    <input class="form-control mt-4 mb-4" minlength="8" id="adr" type="password" name="ConfirmPassword"
                        placeholder="confirm password" required> --}}


                </div>
            </div>
            <button type="submit" name="submit" class="btn btn-dark">Update</button>
        </form>

    </div>
</div>


@endsection

<script>
    function togglePasswordVisibility(passwordInputId, showPasswordIconId) {
        const passwordInput = document.getElementById(passwordInputId);
        const showPasswordIcon = document.getElementById(showPasswordIconId);

        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            showPasswordIcon.innerHTML = '<i class="fas fa-eye-slash"></i>';
        } else {
            passwordInput.type = "password";
            showPasswordIcon.innerHTML = '<i class="fas fa-eye"></i>';
        }
    }
    </script>
