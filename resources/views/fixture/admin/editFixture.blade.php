@extends('layouts.mainAdminLayout')

@section('title', 'Add Fixture')

@section('css', '/css/news/admin-news-style.css')



@section('content')
<div class="container mt-5">
    <h1>Fixture</h1>
    <div class="edit-box">
        <form action="/admin/fixture" method="POST" class="w-100">
            @csrf
            @method('PUT')
            <div class="d-flex justify-content-between align-items-center">
                    <div class="col-5">
                        <div class="team-container">
                            <p class="m-0">{{ $fixture->homeTeam->name }}</p>
                            <img src="{{ asset('storage/logo/' . $fixture->homeTeam->logo) }}" alt="{{ $fixture->homeTeam->name }} logo" class="img-fluid" width="50" height="50">
                            <input type="text" class="form-control" style="width: 50px;">
                        </div>
                    </div>
                    <div class="col-2 vs-container">
                        vs
                    </div>
                    <div class="col-5">
                        <div class="team-container">
                            <input type="text" class="form-control" style="width: 50px;">
                            <img src="{{ asset('storage/logo/' . $fixture->awayTeam->logo) }}" alt="{{ $fixture->awayTeam->name }} logo" class="img-fluid" width="50" height="50">
                            <p class="m-0">{{ $fixture->awayTeam->name }}</p>
                        </div>
                    </div>


            </div>
            <div>
                <button type="submit" class="btn-submit">Submit</button>
            </div>
        </form>
    </div>
</div>
@endsection
