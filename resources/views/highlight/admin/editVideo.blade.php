@extends('layouts.mainAdminLayout')

@section('title', 'Edit Highlight')

@section('css', '/css/highlight/form-highlight-style.css')

@section('content')
<div class="container mt-5">
    <h1>Edit Highlight</h1>
    <div class="form-box mt-3">
        <form action="/admin/highlight/edit/{{ $video->id }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Judul Video" value="{{ $video->title }}">
            </div>
            <div class="mb-3">
                <label for="url" class="form-label">Link</label>
                <input type="text" class="form-control" name="url" placeholder="URL Video" value="{{ $video->url }}">
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{ $video->thumbnail }}">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" cols="30" rows="7" class="form-control" placeholder="Deskripsi Video...">{{ $video->description }}</textarea>
            </div>
            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>

@endsection
