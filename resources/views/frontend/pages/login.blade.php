
@extends('frontend.layouts.master')
@section('title','login')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- <section class="hero-wrap js-fullheight" style="background-image: url('https://www.taslimamarriagemedia.com/img/taslima-marriage-media-banner.jpg');">
	<div class="container">
		<div class="row no-gutters slider-text js-fullheight align-items-end pb-3 justify-content-center">
				<div class="col-md-4 ftco-animate">
					<form method="POST" action="{{ route('login') }}">
                        @csrf
						<div class="row bg-dark p-3 mb-5 search_option_div">
							<div class="col-md-12 p-0">
								<div class="input-group row">
									<label class="col-md-4">Email</label>
							    	<input type="text" name="email" class="col-md-8 form-control-sm" placeholder=" Valid Email ">
							  </div>
							</div>

							<div class="col-md-12 mt-1 p-0">
								<div class="input-group row">
									<label class="col-md-4">Password</label>
							    	<input type="text"  name="password" class="col-md-8 form-control-sm" placeholder="Valid Password">
							  </div>
							</div>

							<div class="col-md-12 d-flex justify-content-end border-bottom pb-3">
								<button class="btn btn-sm  p-2 px-4 mt-1">Login</button>
							</div>

							<div class="col-md-6 text-center">
								<a href="" class="">Forgot Password</a>
							</div>
							<div class="col-md-6 text-center">
								<a href="">Sign UP</a>
							</div>
						</div>
                    </form>
				</div>
			</div>
		</div>

	</section> -->


	@endsection
	