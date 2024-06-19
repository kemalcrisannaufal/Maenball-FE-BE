@extends('layouts.mainAdminLayout')

@section('title', 'Add News')

@section('css', '/css/form/admin-form-style.css')

@section('content')
<div class="container mt-5">
    <h1>Add Team</h1>
    <div class="edit-box">
        <form action="/admin/team" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="Team Name">
            </div>
            <div class="mb-3">
                <label for="initial" class="form-label">Initial</label>
                <input type="text" class="form-control" name="initial" placeholder="Initial Team Name">
            </div>
            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control" id="logo" name="logo">
            </div>
            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
