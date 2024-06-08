@extends('layouts.mainAdminLayout')

@section('title', 'Edit News')

@section('css', '/css/news/admin-news-style.css')

@section('content')
<div class="container mt-5">
    <h1>Edit Berita</h1>
    <div class="edit-box mt-5">
        <form action="/admin/news/edit/{{ $news->id }}" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" value="{{ $news->title }}">
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail" value="{{ $news->thumbnail }}">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control"> {{ $news->content }} </textarea>
            </div>
            <div class="mb-3">
                <button class="btn-submit">Edit Berita</button>
            </div>
        </form>
    </div>
</div>

@endsection
