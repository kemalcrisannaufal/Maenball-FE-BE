@extends('layouts.mainAdminLayout')

@section('title', 'Teams')

@section('css', '/css/news/admin-news-style.css')

@section('content')
    <div class="container mt-5">
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-team">Tambah Klub</a></button>
        </div>
        <h3 class="my-3">List Teams</h3>
        <div class="container mt-4">
            <div class="row">
                @foreach ($teams as $team)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">
                                    <img src="{{ asset('storage/logo/' . $team->logo) }}" alt="{{ $team->name }}" height="50" width="50">
                                    <h5 class="card-title">{{ $team->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
