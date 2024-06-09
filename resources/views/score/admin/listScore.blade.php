@extends('layouts.mainAdminLayout')

@section('title', 'List Score')

@section('css', '/css/form/admin-form-style.css')

@section('content')
    <div class="container mt-5">
        <h1>List Scores</h1>
        <div class="table-responsive mt-2 list-box shadow">
            @if ($scores->count() == 0)
                <div>
                    <h5 class="text-center m-0">Data Tidak Ditemukan</h5>
                </div>
            @else
                <table class="table table-hover table-striped">
                    <thead>
                        <tr class="text-center">
                            <th scope="col">No</th>
                            <th scope="col">Type</th>
                            <th scope="col">Season</th>
                            <th scope="col">Home Team</th>
                            <th scope="col">Away Team</th>
                            <th scope="col">Home Score</th>
                            <th scope="col">Away Score</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($scores as $score)
                            <tr class="text-center">
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $score->fixture->type }}</td>
                                <td>{{ $score->fixture->season->name }}</td>
                                <td>{{ $score->fixture->homeTeam->name }}</td>
                                <td>{{ $score->fixture->awayTeam->name  }}</td>
                                <td>{{ $score->home_score }}</td>
                                <td>{{ $score->away_score }}</td>
                                <td>
                                    <div class="d-flex justify-content-center gap-1 align-items-center">
                                        <form action="/admin/score/delete/{{ $score->id }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-danger"
                                                href="/admin/score/delete/{{ $score->id }}">Delete</button>
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

    <div class="d-flex justify-content-center my-4">
        {{ $scores->links('pagination::bootstrap-4') }}
    </div>

@endsection
