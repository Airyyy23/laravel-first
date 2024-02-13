@extends('layouts.main')

@section('content')
<main class="form-signin w-50 m-auto">
  @if(session()->has("success"))
  <div class="alert alert-success col-lg-12 mt-3" role="alert">
    {{ session("success") }}
  </div>
  @endif
  @if(session()->has("LoginErr"))
  <div class="alert alert-success col-lg-12 mt-3" role="alert">
    {{ session("LoginErr") }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  @endif
  <form method="POST" action="/login/add">
  @csrf
  <h1 class="h3 mb-3 fw-bold text-center">LOGIN</h1>

  <div class="form-floating mb-3">
    <input type="email" name="email" class="form-control" id="floatingInput" placeholder="name@example.com">
    <label for="floatingInput">Email address</label>
  </div>
  <div class="form-floating">
    <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password">
    <label for="floatingPassword">Password</label>
  </div>

  <div class="form-check text-start my-3">
    <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
    <label class="form-check-label" for="flexCheckDefault">
      Ingat saya
    </label>
  </div>
  <button class="btn btn-primary w-100 py-2" type="submit">LOGIN</button>
  <p class="text-center mt-2">Belum punya akun? <a href="/register"><i>Register dulu</i></a></p>
  </form>
</main>
@endsection