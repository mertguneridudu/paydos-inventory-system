<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Paydos | Inventory System - Register</title>
    <link rel="shortcut icon" href="../asset/media/logos/favicon.ico" type="image/x-icon" >
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <link href="{{ asset('asset/css/normalize.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins.bundle.css') }}" rel="stylesheet">
    <link href="{{ asset('asset/css/style.bundle.css') }}" rel="stylesheet">
</head>
<body id="kt_body" class="bg-body">
<div class="d-flex flex-column flex-root">
    <div class="d-flex flex-column flex-lg-row flex-column-fluid">
        <div class="d-flex flex-column flex-lg-row-fluid py-10" style="background-color: #003153">
            <div class="d-flex flex-center flex-column flex-column-fluid">
                <div class="w-lg-500px p-10 p-lg-15 mx-auto">
                    <form class="form w-100" method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="text-center mb-10">
                            <h1 class="text-white mb-3">Sign Up</h1>
                        </div>
                        <div class="fv-row mb-3">
                            <label for="name" class="form-label fs-6 fw-bolder text-white">Name - Surname</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="fv-row mb-3">
                            <label for="email" class="form-label fs-6 fw-bolder text-white">Email Address</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="fv-row mb-3">
                            <label for="password" class="form-label fs-6 fw-bolder text-white">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <div class="fv-row mb-3">
                            <label for="password-confirm" class="form-label fs-6 fw-bolder text-white">Confirm Password</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="text-center">
                            <button type="submit" style="background-color: #454545;" class="btn btn-lg btn-primary w-100 mb-5">
                                <span>Sign Up</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #FFFFFF">
            <div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
                <div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
                    <a href="/" class="py-9 mb-5">
                        <img alt="Paydos Logo" src="{{ asset('asset/image/logo.png') }}" class="h-300px" />
                    </a>
                    <h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #003153;">Paydos | Inventory System</h1>
                    <p class="fw-bold fs-2" style="color: #003153;">Please register
                        <br />with your defined information
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<script>var hostUrl = "assets/";</script>
<script src="{{ asset('asset/js/plugin.bundle.js') }}"></script>
<script src="{{ asset('asset/js/scripts.bundle.js') }}"></script>
</body>
</html>
