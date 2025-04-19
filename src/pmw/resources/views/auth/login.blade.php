<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">

    <title>{{ config('app.name', 'Program Mahasiswa Wirausaha POLBAN') }} | {{ __('Login') }}</title>

    <link rel="apple-touch-icon" href="{{ asset('logo/pmwpolban-2.png') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('logo/pmwpolban-2.png') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/fontawesome/css/all.min.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap-social/bootstrap-social.css') }}">

    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('vendor/stisla2.2.0/dist/assets/css/components.css') }}">
</head>
<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
                        <div class="login-brand">
                            <img src="{{ asset('logo/pmwpolban-1.png') }}" alt="logo" width="200">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header"><h4>{{ __('Login') }}</h4></div>

                            <div class="card-body">
                                <form method="POST" action="" class="needs-validation" novalidate="">
                                    @csrf

                                    <div class="form-group">
                                        <label for="email">{{ __('Email Address') }}</label>
                                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Masukkan Email ...">

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="d-block">
                                            <label for="password" class="control-label">{{ __('Password') }}</label>

                                            @if (Route::has('password.request'))
                                                <div class="float-right">
                                                    <a href="{{ route('password.request') }}" class="text-small">{{ __('Forgot Your Password?') }}</a>
                                                </div>
                                            @endif
                                        </div>
                                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Masukkan Password ...">

                                        @error('password')
                                            <div class="invalid-feedback">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="remember" class="custom-control-input" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                            <label class="custom-control-label" for="remember">{{ __('Remember Me') }}</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary btn-lg btn-block" tabindex="4">
                                            {{ __('Login') }}
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/popper.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/stisla.js') }}"></script>

    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('vendor/stisla2.2.0/dist/assets/js/custom.js') }}"></script>
</body>
</html>
