@extends('layouts.mainLayout')

@section('title', 'Edit Profile')

@section('css', '/css/news/admin-news-style.css')

@section('content')

<div class="container mt-5">
    <h1>Edit Profile</h1>
    <div class="bg-light p-5 shadow" style="height: 300px">
        <form action="/profile/edit/{{ $user->id }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            @method('PATCH')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
                <label for="profile_picture" class="form-label">Profile Picture</label>
                <input type="file" class="form-control" id="profile_picture" name="profile_picture">
            </div>
            <div class="mb-3">
                <button class="btn-submit">Edit</button>
            </div>
        </form>
    </div>
</div>

@endsection
