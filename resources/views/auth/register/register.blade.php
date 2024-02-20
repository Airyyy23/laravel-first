@extends('layouts.auth')

@section('content')
<main class="form-signin w-50 m-auto">
    <form action="/register/add" method="POST">
        @csrf
        <h1 class="h3 mb-3 fw-bold text-center">REGISTER</h1>

        @if(session('error'))
            <div class="alert alert-danger" role="alert">
                {{ session('error') }}
            </div>
        @endif

        <div class="form-floating mb-3">
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="floatingInput" placeholder="Nama" value="{{ old('name') }}">
            <label for="floatingInput">Name</label>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="floatingInput" placeholder="name@example.com" value="{{ old('email') }}">
            <label for="floatingInput">Email address</label>
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="floatingPassword" placeholder="Password" value="{{ old('password') }}">
            <label for="floatingPassword">Password</label>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-floating mb-3">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="floatingPassword" placeholder="Confirm Password" value="{{ old('password_confirmation') }}">
            <label for="floatingPassword">Confirm Password</label>
            @error('password_confirmation')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary w-100 py-2 mt-3" type="submit">REGISTER</button>
        <p class="text-center mt-2">Sudah punya akun? <a href="/login"><i>Login</i></a></p>
    </form>
</main>
@endsection
