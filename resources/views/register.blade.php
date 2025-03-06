<!--
=========================================================
Login Form Bootstrap 1
=========================================================

Product Page: https://uifresh.net
Copyright 2021 UIFresh (https://uifresh.net)
Coded by UIFresh

=========================================================
The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uf-style.css') }}">
    <title>Register Form Bootstrap 1 by UIFresh</title>
  </head>
  <body>
    <div class="uf-form-signin">
      <div class="text-center">
        <a href="/"><img src="{{ asset('assets/img/logo-fb.png') }}" alt="" width="100" height="100"></a>
      <h1 class="text-white h3">Account Register</h1>
      </div>
      <form class="mt-4">
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input type="text" class="form-control" placeholder="Your name">
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-envelope"></span>
          <input type="text" class="form-control" placeholder="Email address">
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-phone"></span>
          <input type="text" class="form-control" placeholder="Your phone">
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input type="password" class="form-control" placeholder="Password">
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input type="password" class="form-control" placeholder="Password confirmation">
        </div>
        <div class="d-grid mb-4">
          <button type="submit" class="btn uf-btn-primary btn-lg">Sign Up</button>
        </div>
        <div class="mt-4 text-center">
          <span class="text-white">Already a member?</span>
          <a href="{{ route('login') }}">Login</a>
        </div>
      </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
  </body>
</html>
