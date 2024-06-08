@extends('layouts.mainAdminLayout')

@section('title', 'Add Video')

@section('css', '/css/highlight/form-highlight-style.css')

@section('content')

<div class="container mt-5">
    <h1>Tambah Highlight</h1>
    <div class="form-box">
        <form action="/admin/highlight" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Judul Video">
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Link</label>
                <input type="text" class="form-control" name="url" placeholder="URL Video">
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="7" class="form-control" placeholder="Deskripsi Video..."></textarea>
            </div>
            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
