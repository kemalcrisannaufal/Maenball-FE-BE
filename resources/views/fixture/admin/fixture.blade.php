@extends('layouts.mainAdminLayout')

@section('title', 'List Fixtures')

@section('css', '/css/news/admin-news-style.css')

@section('content')
    <div class="container mt-5">
        <h1>List Fixtures</h1>
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-fixture">Add Fixtures</a></button>
        </div>
        <div class="table-responsive mt-2 list-box shadow">
            @if ($fixtures->count() == 0)
                <div class="p-2" style="background-color: rgb(2, 60, 94);">
                    <h5 class="text-white text-center m-0">Data Tidak Ditemukan</h5>
                </div>
            @else
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Season</th>
                            <th scope="col">Home Team</th>
                            <th scope="col">Away Team</th>
                            <th scope="col">Location</th>
                            <th scope="col">Kick-off</th>
                            <th scope="col">Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($fixtures as $fixture)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $fixture->season->name }}</td>
                                <td>{{ $fixture->homeTeam->name }}</td>
                                <td>{{ $fixture->awayTeam->name  }}</td>
                                <td>{{ $fixture->location }}</td>
                                <td>{{ $fixture->kickoff }}</td>
                                <td>{{ $fixture->status }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1 align-items-center">
                                        <a class="btn btn-primary" href="/admin/fixture/edit/{{ $fixture->id }}">Make Finish</a>
                                        <form action="/admin/fixture/delete/{{ $fixture->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                href="/admin/fixture/delete/{{ $fixture->id }}">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>

@endsection
