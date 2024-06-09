@extends('layouts.mainAdminLayout')

@section('title', 'Seasons')

@section('css', '/css/form/admin-form-style.css')

@section('content')
    <div class="container mt-5">
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-season">Add Seasons</a></button>
        </div>
        <h3 class="my-3">List Season</h3>
        <div class="container mt-4">
            <div class="row">
                @foreach ($seasons as $season)
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="d-flex gap-3 align-items-center">

                                    <h5 class="card-title">{{ $season->name }}</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@endsection
