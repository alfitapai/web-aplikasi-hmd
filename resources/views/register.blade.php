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
            <a href="/"><img src="{{ asset('assets/img/logo-fb.png') }}" alt="" width="100"
                    height="100"></a>
            <h1 class="text-white h3">Account Register</h1>
        </div>
        <form action="{{ route('prosdaftar') }}" class="mt-4" id="fRegis" method="POST">
            @csrf
            <div class="input-group uf-input-group input-group-lg mb-3">
                <span class="input-group-text fa fa-user"></span>
                <input type="text" name="userid" class="form-control" placeholder="user Id" id="userId" value="{{ old('userid') }}">
            </div>
            <div class="input-group uf-input-group input-group-lg mb-3">
                <span class="input-group-text fa fa-envelope"></span>
                <input type="text" name="email" class="form-control" placeholder="Email address" id="email" value="{{ old('email') }}">
            </div>
            {{-- <div class="input-group uf-input-group input-group-lg mb-3">
                <span class="input-group-text fa fa-phone"></span>
                <input type="text" class="form-control" placeholder="Your phone">
            </div> --}}
            <div class="input-group uf-input-group input-group-lg mb-3">
                <span class="input-group-text fa fa-lock"></span>
                <input type="password" name="password" class="form-control" placeholder="Password" id="password">
            </div>
            <div class="input-group uf-input-group input-group-lg mb-3">
                <span class="input-group-text fa fa-lock"></span>
                <input type="password" name="conf_passwd" class="form-control" placeholder="Password confirmation" id="conf-passwd">
            </div>
            <div class="d-grid mb-4">
                <button type="submit" class="btn uf-btn-primary btn-lg" id="btnDaftar">Sign Up</button>
            </div>
            <div class="mt-4 text-center">
                <span class="text-white">Already a member?</span>
                <a href="{{ route('login') }}">Login</a>
            </div>
        </form>
    </div>

    <!-- JavaScript -->

    <!-- Separate Popper and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/script/ajaxsetup.js') }}"></script>
    <script src="{{ asset('assets/script/loginregister/register.js') }}"></script>
    <script src="{{ asset('assets/script/toast.js') }}"></script>
    @if (session('type')&& session('title')&& session ('text'))
    <script>
        Swal.fire({
            title: '{{ session('title') }}',
            html: '{!!  session('text') !!}',
            icon: '{{ session('type') }}',
            confirmButtonText: 'OKE'
        });
    </script>
    @endif
    {{-- <script>
        $(document).ready(function() {
            var type = '{{ session('type') }}';
            var title = '{{ session('title') }}';
            var message = '{{ session('message') }}';
            var err = '{{ session('error') }}';
            var dariAlihan = '{{ session('dariAlihan') }}';
            var validationErrors = @json(session('validationErrors', []));


            if (type && title && message) {
                Toast.fire({
                    icon: type,
                    title: title,
                    text: message
                });
            }
        });
    </script> --}}
</body>

</html>
