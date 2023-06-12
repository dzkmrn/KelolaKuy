@extends('layout.app')

@section('title', 'Masuk')

@section('content')

<div class="container">

    <section class="section register min-vh-90 d-flex flex-column align-items-center justify-content-center py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 d-flex flex-column align-items-center justify-content-center">

                    <div class="d-flex justify-content-center py-4">
                        <a href="index.html" class="logo d-flex align-items-center w-auto">
                        </a>
                    </div><!-- End Logo -->

                    <div class="card mb-3" style="margin-bottom: 30px;border: none;border-radius: 5px;box-shadow: 0px 0 30px rgba(1, 41, 112, 0.1);">

                        <div class="card-body">

                            <div class="pt-4 pb-2">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img class="d-flex justify-content-center align-items-center" style="width:100px;padding:3px;" src="../../dist/img/k_logo_big.png" alt="">
                                </div>
                                <h5 class="card-title text-center pb-0 fs-4" style="color: #B1B2FF;">Masuk ke akun</h5>
                                <p class="text-center small">Masukkan username dan password anda!</p>
                            </div>

                            @if(count($errors))
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif

                            <form class="row g-3 needs-validation" method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="col-12">
                                    <label for="username" class="form-label">{{ __('Username') }}</label>
                                    <div class="input-group has-validation">
                                        <span class="input-group-text" id="inputGroupPrepend">@</span>
                                        <input type="text" name="username" value="{{ old('username') }}" class="form-control" id="username" required autocomplete="username" autofocus>
                                        <div class="invalid-feedback">Tolong masukkan username anda!</div>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="invalid-feedback">Tolong masukkan password anda!</div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <div class="col-12">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" value="true" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                                    </div>
                                </div>

                                <div class="button-login">
                                    <div class="col-12">
                                        <button class="btn w-100" style="background-color: #AAC4FF;color: white;" type="submit">Masuk</button>
                                    </div>
                                </div>

                                <div class="col-12">
                                    <p class="small mb-0">Tidak memiliki akun? <a style="color: #AAC4FF;" href="register">Buat Akun</a></p>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>

</div>
@endsection