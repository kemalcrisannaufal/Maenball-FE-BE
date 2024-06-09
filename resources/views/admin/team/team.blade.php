@extends('layouts.mainAdminLayout')

@section('title', 'Teams')

@section('css', '/css/form/admin-form-style.css')

@section('content')
    <div class="container mt-5">
        <div class="d-flex mt-3">
            <button class="btn-add"><a href="/admin/add-team">Tambah Klub</a></button>
        </div>
        <h3 class="my-3">List Teams</h3>

        @if ($teams->count() == 0)
            <div class="p-2 mt-5"">
                <h5 class="text-center m-0">Tidak ada team</h5>
            </div>
        @else
            <div class="container mt-4">
                <div class="row">
                    @foreach ($teams as $team)
                        <div class="col-md-3 mb-4">
                            <div class="card shadow-md">
                                <div class="card-body">
                                    <div class="d-flex flex-column gap-3 align-items-center">
                                        <img src="{{ asset('storage/logo/' . $team->logo) }}" alt="{{ $team->name }}"
                                            height="150" width="150">
                                        <h5 class="card-title">{{ $team->name }}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        <div class="d-flex justify-content-center my-4">
            {{ $teams->links('pagination::bootstrap-4') }}
        </div>

    </div>

@endsection
