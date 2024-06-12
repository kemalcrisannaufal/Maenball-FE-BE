@extends('layouts.mainAdminLayout')

@section('title', 'Home')

@section('css', '/css/home/admin-home-style.css')

@section('content')

@section('body', 'admin-bg')

<h1 class="my-3 ms-5 text-white">Welcome Admin</h1>
<div class="container-fluid d-flex flex-column justify-content-center align-items-center">
    <div class="row justify-content-center">
        <div class="col-6 col-sm-4 col-md-3 mb-3">
            <a href="/admin/list-news">
                <div class="box">
                    Berita
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-3 mb-3">
            <a href="/admin/list-highlight">
                <div class="box">
                    Highlight
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-3 mb-3">
            <a href="/admin/list-teams">
                <div class="box">
                    Teams
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-3 mb-3">
            <a href="/admin/list-seasons">
                <div class="box">
                    Seasons
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-3 mb-3">
            <a href="/admin/list-fixtures">
                <div class="box">
                    Fixtures
                </div>
            </a>
        </div>
        <div class="col-6 col-sm-4 col-md-3 mb-3">
            <a href="/admin/list-scores">
                <div class="box">
                    Score
                </div>
            </a>
        </div>
    </div>
</div>

@endsection
