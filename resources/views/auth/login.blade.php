@extends('frontend.layouts.master')
@section('title','Login')
@section('content')
<section class="hero-wrap" style="background-image: url('{{ asset('images/reg_bg.jpg')}}');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-end justify-content-center">
            <div class="col-md-6 ftco-animate m-3 bg-light-green p-3">
                <h2 class="text-center border-bottom form-label">Login</h2>
                <div id="messages" class="text-center">
                    <div id="success-message" class="alert alert-success alert-dismissible fade show" role="alert" style="display:none;">
                        <span id="success-text"></span>
                    </div>
                    <div id="error-message" class="alert alert-danger alert-dismissible fade show" role="alert" style="display:none;">
                        <span id="error-text"></span>
                    </div>
                </div>
                <div class=" p-2">
                    <div class="">
                        <div class="ftco-animate">
                            <form method="POST" action="{{ route('user.login') }}">
                                @csrf
                                <div class="form-group mb-1">
                                    <label for="email" class="form-label mb-0">Email</label>
                                    <input id="email" type="email" placeholder="Username or Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="pwd" class="form-label mb-0">Password:</label>
                                     <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group form-check">
                                    <label class="form-check-label form-label ml-2">
                                        <input class="form-check-input" type="checkbox"> Remember me
                                    </label>
                                    <button type="submit" class="btn btn-sm btn-primary float-right">Login</button>
                                </div>
                                <div class="form-group row">
                                    <div class="col-md-6">
                                        <a href="#" class="">Forgot Password</a>
                                    </div>
                                    <div class="col-md-6 text-right">
                                        <a href="{{ route('profile_create') }}">Create New Profile</a>
                                    </div>
                                </div>
                            </form>
                        </div>

                         {{-- <div id="login-form">
                            <div class="row">
                                <div class="form-group col-md-12 mb-2">
                                    <label class="mb-1 form-label">Email Addres <span class="text-danger">*</span></label>
                                    <input type="text" name="email" class="form-control" placeholder="Enter your email add..." required />
                                    @if ($errors->has('email'))
                                    <div class="error" class="text-danger">
                                        {{ $errors->first('email') }}
                                    </div>
                                    @endif
                                </div>

                                <div class="form-group col-md-12 ">
                                    <label class="mb-1 form-label">Password <span class="text-danger">*</span></label>
                                    <input type="password" name="password" class="form-control" placeholder="Enter your password" required />
                                    @error('password')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <div class="d-flex my-2 justify-content-between">
                                        <div class="d-inline-block mr-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="">
                                                <label class="form-check-label mb-0 form-label" for="">Remember me</label>
                                            </div>
                                        </div>
                                        <p><a class="text-primary" href="#">Forgot Password?</a></p>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block mb-2" onclick="login()">Log In</button>


                                    <p class="sign-upp form-label">Don't have an account yet ?
                                        <a class="text-primary" href="#">Register</a>
                                    </p>

                                    <div class="row d-flex justify-content-center mt-4">

                                        <div class="col-md-6">
                                            <button type="button" class="btn rounded border border-primary fw-bold w-100 facebook-btn mt-2" onclick="registerWithFacebook()">
                                                <img src="/frontend/images/icons/facebook.png" alt="facebook" height="20" class="mr-2">
                                                Continue with Facebook
                                            </button>
                                        </div>

                                        <div class="col-md-6">
                                            <button type="button" class="btn rounded border border-danger google-btn fw-bold w-100 mt-2" onclick="registerWithGoogle()">
                                                <img src="/frontend/images/icons/google.png" alt="google" height="20" class="mr-2">
                                                Continue with Google
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('scripts')

<script>
    // loggedIn = $.trim(localStorage.getItem("userLoggedIn"));
    // if (loggedIn == "1") {
    //     window.location.href = "{{ route('index') }}";
    // }

    // function login() {
    //     var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
    //     var email = $('input[name="email"]').val();
    //     var password = $('input[name="password"]').val();

    //     let urlParams = new URLSearchParams(window.location.search);

    //     // Get the value of the 'url' parameter
    //     let reqURL = urlParams.get('url');

    //     var url = "{{ route('user.login') }}";

    //     console.log(url)
    //     $.ajax({
    //         type: 'POST',
    //         url: url,
    //         data: {
    //             _token: CSRF_TOKEN,
    //             email: email,
    //             password: password
    //         },

    //         success: function(data) {
    //             if (data.status === 'Success') {
    //                 localStorage.setItem("userLoggedIn", "1");
    //                 localStorage.setItem("userToken", data.data.token);
    //                 localStorage.setItem("userFirstName", data.data.first_name);
    //                 localStorage.setItem("userLastName", data.data.last_name);
    //                 localStorage.setItem("userEmail", data.data.email);
    //                 localStorage.setItem("userID", data.data.id);
    //                 localStorage.setItem("userHash", data.data.hash);
    //                 localStorage.setItem("cartSession", '');

    //                 // toastr.success('Login Successful', 'Success', {
    //                 //     timeOut: 5000,
    //                 //     toastClass: 'toast-success'
    //                 // });

    //                 $('#success-text').text("Login Successful. Redirecting...");
    //                 $('#success-message').show();
    //                 $('#error-message').hide();

    //                 if (reqURL) {
    //                     window.location.href = '/' + reqURL;
    //                 } else {
    //                     window.location.href = "{{ route('member.dashboard') }}";
    //                 }

    //             } else if (data.status === 'Warning') {
    //                 console.log(data);
    //                 window.location.href = "{{ route('index') }}";
    //             } else {
    //                 alert('Invalid email or password');
    //             }
    //         },
    //         error: function(xhr, status, error) {
    //             const response = JSON.parse(xhr.responseText);
    //             toastr.error(response.message, 'Error', {
    //                 timeOut: 5000,
    //                 toastClass: 'toast-error'
    //             });
    //         }
    //     });
    // };


    // function registerWithGoogle() {
    //     window.location.href = "/?from=login&cart_session=" + encodeURIComponent(cartSession);
    // }

    // function registerWithFacebook() {
    //     window.location.href = "/?from=login&cart_session=" + encodeURIComponent(cartSession);
    // }
</script>
@endpush