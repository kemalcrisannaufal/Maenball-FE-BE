@extends('layouts.auth.authLayout')

@section('title', 'Register')

@section('content')
    <div>
        <div class="mb-3 text-center">
            <h1 class="text-white">Welcome Back</h1>
            <p class="text-white">Enter your credentials to access your account</p>
        </div>
        <form class="w-100" action="/register" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label text-white">Name</label>
                <input type="name" class="form-control" id="name" placeholder="John Doe" name="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label text-white">Email address</label>
                <input type="email" class="form-control" id="email" placeholder="name@example.com" name="email">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label text-white">Password</label>
                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
            </div>
            <div class="mb-3">
                <label for="confirmPassword" class="form-label text-white">Confirmation Password</label>
                <input type="password" class="form-control" id="confirmPassword" placeholder="Password" name="confirm_password">
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign Up</button>
            <small class="text-white">Have an account? <a href="/login" style="text-decoration: none"
                    class="text-primary fw-bold">Sign in</a></small>
        </form>
    </div>
@endsection
