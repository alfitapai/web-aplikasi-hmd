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
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- <link rel="icon" type="image/png" href="./assets/img/favicon.png"> --}}
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/uf-style.css') }}">
    <title>Login Form Bootstrap 1 by UIFresh</title>
  </head>
  <body>
    <div class="uf-form-signin">
      <div class="text-center">
        <a href="/"><img src="{{ asset('assets/img/logo-fb.png') }}" alt="" width="100" height="100"></a>
      <h1 class="text-white h3">Account Login</h1>
      </div>
      <form class="mt-4" action="{{ route('proslogin') }}" method="POST">
        @csrf
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-user"></span>
          <input type="text" class="form-control" placeholder="Username or Email address" name="emailuser" value="{{ old('emailuser') }}">
        </div>
        <div class="input-group uf-input-group input-group-lg mb-3">
          <span class="input-group-text fa fa-lock"></span>
          <input type="password" class="form-control" placeholder="Password" name="password">
        </div>
        <div class="d-flex mb-3 justify-content-between">
          <div class="form-check">
            <input type="checkbox" class="form-check-input uf-form-check-input" name="ingat" id="exampleCheck1">
            <label class="form-check-label text-white" for="exampleCheck1"  >Remember Me</label>
          </div>
          <a href="#">Forgot password?</a>
        </div>
        <div class="d-grid mb-4">
          <button type="submit" class="btn uf-btn-primary btn-lg">Login</button>
        </div>
        <div class="d-flex mb-3">
            <div class="dropdown-divider m-auto w-25"></div>
            <small class="text-nowrap text-white">Or login with</small>
            <div class="dropdown-divider m-auto w-25"></div>
        </div>
        <div class="uf-social-login d-flex justify-content-center">
          <a href="#" class="uf-social-ic" title="Login with Facebook"><i class="fab fa-facebook-f"></i></a>
          <a href="#" class="uf-social-ic" title="Login with Twitter"><i class="fab fa-twitter"></i></a>
          <a href="#" class="uf-social-ic" title="Login with Google"><i class="fab fa-google"></i></a>
        </div>
        <div class="mt-4 text-center">
          <span class="text-white">Don't have an account?</span>
          <a href="{{ route('daftar') }}">Sign Up</a>
        </div>
      </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/script/ajaxsetup.js') }}"></script>
    <script src="{{ asset('assets/script/toast.js') }}"></script>
    @if (session('type') && session('title') && session('text'))
    <script>
        Swal.fire({
            title: '{{ session('title') }}',
            html: '{!! session('text') !!}',
            icon: '{{ session('type') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

  </body>
</html>
