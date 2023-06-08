@extends('layouts.auth')
@section('content')
    {{-- <div class="login-box"> --}}
    <div class="register-logo">
        <a href="../../index2.html"><b>GIS </b>Situs Seni Budaya</a>
    </div>
    <div class="card">
        <div class="card-body register-card-body">
            <p class="login-box-msg">Registrasi Sebagai Kontributor</p>
            <form action="/regist/store" method="post">
                @csrf
                <label for="name">Nama Lengkap</label>
                <div class="input-group mb-3">
                    <input type="name" class="form-control" placeholder="Nama Lengkap" value="{{ old('name') }}"
                        @error('name') is invalid @enderror id="name" name="name" required>

                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <label for="username">Username</label>
                <div class="input-group mb-3">
                    <input type="username" class="form-control" placeholder="Username" value="{{ old('username') }}"
                        @error('username') is invalid @enderror id="username" name="username" required>
                    @error('username')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <label for="email">Email</label>
                <div class="input-group mb-3">
                    <input type="email" class="form-control" placeholder="Email" value="{{ old('email') }}"
                        @error('email') is invalid @enderror id="email" name="email" required>
                    @error('email')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <label for="password">Password</label>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Password" value="{{ old('password') }}"
                        @error('password') is invalid @enderror id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                {{-- <div class="input-group mb-3">
                    <input type="password" class="form-control" placeholder="Tulis Ulang Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div> --}}



                <button type="submit" class="btn btn-primary btn-block">Register</button>


            </form>
            {{-- <div class="social-auth-links text-center">
                <p>- OR -</p>
                <a href="#" class="btn btn-block btn-primary">
                    <i class="fab fa-facebook mr-2"></i>
                    Sign up using Facebook
                </a>
                <a href="#" class="btn btn-block btn-danger">
                    <i class="fab fa-google-plus mr-2"></i>
                    Sign up using Google+
                </a>
            </div>
            <a href="login.html" class="text-center">I already have a membership</a> --}}
        </div>

    </div>
    {{-- </div> --}}
@endsection
