@extends('layouts.mainLayout')

@section('title', 'Profile')

@section('content')

<div class="container mt-5 d-flex justify-content-center">
    <div class="d-flex mt-5 gap-5 justify-content-center align-items-center">
        @if ($user->profile_picture == null)
            <img src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt="" width="200" height="200">
        @else
            <img src="{{ asset('storage/profile/' . $user->profile_picture) }}" alt="" width="200" height="200">
        @endif
        <div>
            <h1>{{ $user->name }}</h1>
            <p>{{ $user->email }}</p>
            <a href="/profile/edit/{{ $user->id }}" class="btn btn-primary mt-3">Edit Profile</a>
        </div>
    </div>

</div>

@endsection
