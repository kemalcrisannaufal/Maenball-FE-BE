@extends('layouts.mainAdminLayout')

@section('title', 'Add News')

@section('css', '/css/news/admin-news-style.css')

@section('content')
<div class="container mt-5">
    <h1>Form Tambah Berita</h1>
    <div class="edit-box">
        <form action="/admin/news" method="POST" enctype="multipart/form-data" class="w-100">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" placeholder="Judul Berita">
            </div>
            <div class="mb-3">
                <label for="thumbnail" class="form-label">Thumbnail</label>
                <input type="file" class="form-control" id="thumbnail" name="thumbnail">
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea name="content" id="content" cols="30" rows="10" class="form-control" placeholder="Isi Berita..."></textarea>
            </div>
            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
