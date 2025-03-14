<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/css/app.css') }}">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.css" />

    <style>
        body {
            display: flex;
            min-height: 100vh;
            flex-direction: column;
        }

        .wrapper {
            display: flex;
            flex: 1;
            margin-top: 100px;
        }

        .sidebare {
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            height: 100%;
            background-color: #eeeeee;
            padding-top: 56px;
            transition: all 0.3s;
        }

        .sidebare.collapsed {
            width: 0;
            overflow: hidden;
        }

        .content {
            flex: 1;
            margin-left: 250px;
            transition: all 0.3s;
        }

        .content.collapsed {
            margin-left: 0;
        }

        .punyauser {
            width: 250px;
            position: absolute;
            bottom: 20px;
            /* left: 0; */
        }

        .isiuser {
            position: relative;
            left: 50px;
        }

        /* .item-user{
            border: 1px solid #c4c4c4;
            border-top: 1px solid #c4c4c4;
            border-bottom: 1px solid #c4c4c4;
        } */


        @media (max-width:991px) {
            .sidebare {
                width: 0;
                overflow: hidden;
            }

            .sidebare.show {
                width: 250px;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>

</head>

<body class="layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">
        <div class="main">
            @include('layout.sidebar')
            @include('layout.navbar')
            <main class="content">
                @yield('home')
                @yield('lamanpenjualan')
                @yield('stok')
                @yield('pengaturan')
                {{-- @yield('penjualan') --}}
            </main>

        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.17.2/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('assets/js/script/ajaxsetup.js') }}"></script>
    <script src="{{ asset('assets/script/toast.js') }}"></script>
    <script src="https://kit.fontawesome.com/9a4cb6ac9c.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.datatables.net/2.2.2/js/dataTables.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="{{ asset('assets/js/formatrupiah.js') }}"></script>
    @if (session('type') && session('title') && session('text'))
        <script>
            Toast.fire({
                title: '{{ session('title') }}',
                icon: '{{ session('type') }}',
                text: '{{ session('text') }}'
            });
        </script>
    @endif
    <script>
        function toggleSidebar() {
            // document.getElementById('sidebare').classList.toggle('show');
            // document.getElementById('content').classList.toggle('collapsed');
            const sidebar = $('#sidebare');
            const content = $('#content');
            if (sidebar && content) {
                sidebar.classList.toggle('show');
                content.classList.toggle('collapsed');
            }
        };
    </script>
    @yield('shome')
    @yield('slamanpenjualan')
    @yield('sstok')
    @yield('spengaturan')
</body>

</html>
