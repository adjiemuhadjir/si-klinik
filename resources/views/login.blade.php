@extends('layouts.home')

@section('container')
    <div class="col-lg-6 d-flex align-items-center justify-content-center">
        <div class="auth-form-transparent text-left p-3">

            @if (session('success'))
                <div class="alert alert-success">
                    <p>{{ session('success') }}</p>
                </div>
            @endif

            @if (session('loginError'))
                <div class="alert alert-danger">
                    <p>{{ session('loginError') }}</p>
                </div>
            @endif

            <h4>SISTEM INFORMASI <span style="color: green"> KLINIK</span></h4>
            <form class="pt-3" method="POST" action="/login">
                @csrf
                <div class="form-group">
                    <label>Email</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-book text-primary"></i>
                            </span>
                        </div>
                        <input type="email" name="email" required
                            class="form-control form-control-lg border-left-0 @error('email') is-invalid @enderror"
                            placeholder="Masukkan email" value="{{ old('email') }}" autofocus>
                        @error('email')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label>Password</label>
                    <div class="input-group">
                        <div class="input-group-prepend bg-transparent">
                            <span class="input-group-text bg-transparent border-right-0">
                                <i class="mdi mdi-account-outline text-primary"></i>
                            </span>
                        </div>
                        <input type="password" name="password" required class="form-control form-control-lg border-left-0"
                            placeholder="Password">
                    </div>
                </div>
                <div class="mt-3">
                    <button class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LOGIN</button>
                </div>
            </form>
        </div>
    </div>
@endsection
