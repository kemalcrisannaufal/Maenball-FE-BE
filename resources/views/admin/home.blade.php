@extends('layouts.mainAdminLayout')

@section('title', 'Home')

@section('css', '/css/home/admin-home-style.css')

@section('content')

<div class="container mt-5">
    <h1 class="mb-3">Selamat Datang Admin</h1>
    <div class="d-flex gap-5 justify-content-center">
        <a href="/admin/list-news">
            <div class="box">
                Berita
            </div>
        </a>
        <a href="/admin/list-highlight">
            <div class="box">
                Highlight
            </div>
        </a>
        <a href="/admin/list-teams">
            <div class="box">
                Teams
            </div>
        </a>
    </div>
</div>

@endsection
