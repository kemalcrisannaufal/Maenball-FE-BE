@extends('layouts.mainAdminLayout')

@section('title', 'List Highlight')

@section('css', '/css/form/admin-form-style.css')

@section('content')
    <div class="container mt-5">
        <h1>Daftar Highlight</h1>
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-highlight">Tambah Highlight</a></button>
        </div>

        @if ($videos->count() == 0)
            <div class="p-2 mt-5" style="background-color: rgb(2, 60, 94);">
                <h5 class="text-white text-center m-0">Tidak ada highlight</h5>
            </div>
        @else
            <div class="table-responsive mt-2 list-box shadow">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Publisher</th>
                            <th scope="col">Title</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($videos as $value)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $value->admin->name }}</td>
                                <td>{{ $value->title }}</td>
                                <td>{{ $value->created_at }}</td>
                                <td>{{ $value->updated_at }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1 align-items-center">
                                        <a class="btn btn-primary" href="/admin/highlight/edit/{{ $value->id }}">Edit</a>
                                        <form action="/admin/highlight/delete/{{ $value->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        @endif
    </div>
    @endsection
