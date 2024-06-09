@extends('layouts.mainAdminLayout')

@section('title', 'Add Fixture')

@section('css', '/css/form/admin-form-style.css')

@section('content')
    <div class="container mt-5">
        <h1>Fixture</h1>
        <div class="edit-box">
            <form action="/admin/score/{{ $fixture->id }}" method="POST" class="w-100 pt-3">
                @csrf
                <div class="d-flex justify-content-between align-items-center">
                    <div class="col-5">
                        <div class="team-container">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <img src="{{ asset('storage/logo/' . $fixture->homeTeam->logo) }}"
                                    alt="{{ $fixture->homeTeam->name }} logo" class="img-fluid" width="150"
                                    height="150">
                                <p class="m-0 fw-bold fs-4">{{ $fixture->homeTeam->name }}</p>
                            </div>
                            <input type="text" class="form-control score-input" name="home_score">
                        </div>
                    </div>
                    <div class="col-2 vs-container">
                        <h1>vs</h1>
                    </div>
                    <div class="col-5">
                        <div class="team-container">
                            <input type="text" class="form-control score-input" name="away_score">
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <img src="{{ asset('storage/logo/' . $fixture->awayTeam->logo) }}"
                                    alt="{{ $fixture->awayTeam->name }} logo" class="img-fluid" width="150"
                                    height="50">
                                <p class="m-0 m-0 fw-bold fs-4">{{ $fixture->awayTeam->name }}</p>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="mt-5">
                    <button type="submit" class="btn-submit">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
