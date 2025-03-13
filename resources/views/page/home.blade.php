@extends('layout.app')
@section('title','Home')
@section('page_title','Dashboard')
@section('home')
<div class="container-fluid p-0">
    {{-- <h1 class="h3 mb-3"><strong>Home</strong></h1> --}}
    <div class="row">
        @include('page.dashboard.penjualan')
    </div>
</div>
@endsection
