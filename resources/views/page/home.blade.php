@extends('layout.app')
@section('title', 'Home')
@section('page_title', 'Dashboard')
@section('home')
    <div class="container-fluid p-0">
        <div class="row">
            @include('page.dashboard.penjualan')
        </div>
    </div>
@endsection

@section('shome')
    <script src="{{ asset('assets/script/laman/home.js') }}"></script>
@endsection
