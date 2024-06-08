@extends('layouts.mainAdminLayout')

@section('title', 'Add News')

@section('css', '/css/news/admin-news-style.css')

@section('content')
<div class="container mt-5">
    <h1>Add Season</h1>
    <div class="edit-box">
        <form action="/admin/season" method="POST" class="w-100">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Season Name">
            </div>
            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
