@extends('layouts.mainAdminLayout')

@section('title', 'Add Fixture')

@section('css', '/css/news/admin-news-style.css')

@section('content')
<div class="container mt-5">
    <h1>Add Fixture</h1>
    <div class="edit-box">
        <form action="/admin/fixture" method="POST" class="w-100">
            @csrf
            <div class="mb-3">
                <label for="type" class="form-label">Fixture Type</label>
                <select name="type" id="type" class="form-select">
                        <option value="Group Stage">Group Stage</option>
                        <option value="Round of 16">Round of 16</option>
                        <option value="Quarter-finals">Quarter-finals</option>
                        <option value="Semi-finals">Semi-finals</option>
                        <option value="Final">Final</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="season" class="form-label">Season</label>
                <select name="id_season" id="season" class="form-select">
                    @foreach ($seasons as $season)
                        <option value="{{ $season->id }}">{{ $season->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="home_team" class="form-label">Home Team Name</label>
                <select name="id_home_team" id="home_team" class="form-select">
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="away_team" class="form-label">Away Team Name</label>
                <select name="id_away_team" id="away_team" class="form-select">
                    @foreach ($teams as $team)
                        <option value="{{ $team->id }}">{{ $team->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" name="location" placeholder="Location">
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label for="kickoff">Kickoff</label>
                    <input type="datetime-local" class="form-control" id="kickoff" name="kickoff" required>
                </div>
            </div>



            <div class="mb-3">
                <button class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
