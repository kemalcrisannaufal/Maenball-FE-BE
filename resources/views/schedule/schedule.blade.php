@extends('layouts.mainLayout')

@section('title', 'Schedule')

@section('css', 'css/schedule/schedule-style.css')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                @if ($main_schedule != null)
                    @php
                        $kickoff = Carbon\Carbon::parse($main_schedule['kickoff'])->format('Y-m-d H:i');
                    @endphp
                    <div class="img-box">
                        <img src="images/schedule.png" alt="" class="img">
                        <div class="newest-schedule-match">
                            <p class="fw-bold fs-2 text-white mb-3" id="title">Upcoming Match</p>
                            <div class="d-flex justify-content-start align-items-center gap-3">
                                <img src="{{ '/storage/logo/' . $main_schedule['home_team']['logo'] }}" alt=""
                                    width="80px">
                                <p class="fw-bold fs-2 text-white">VS</p>
                                <img src="{{ '/storage/logo/' . $main_schedule['away_team']['logo'] }}" alt=""
                                    width="80px">
                            </div>
                            <div class="d-flex justify-content-start align-items-center gap-5 mt-3">
                                <div class="d-flex align-items-center gap-3">
                                    <i class="far fa-clock"></i>
                                    <p class="text-white"> {{ $kickoff }}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-center gap-3 mt-3">
                                <i class="fas fa-map-marker-alt"></i>
                                <p>{{ $main_schedule['location'] }}</p>
                            </div>
                            <div class="newest-schedule-clubname">
                                <p class="fw-bold fs-4 mb-3">{{ $main_schedule['home_team']['name'] }}</p>
                                <p class="fw-bold fs-4">
                                    &nbsp;&nbsp;&nbsp;{{ $main_schedule['away_team']['name'] }}</p>
                            </div>
                        </div>
                    </div>
                @else
                    <img src="images/schedule.png" alt="" class="img">
                    <div class="newest-schedule-match">
                        <div class="d-flex justify-content-start align-items-center gap-3">
                            <p class="fw-bold fs-2 text-white">Tidak Ada Match</p>
                        </div>
                    </div>
                @endif

                <h1 class="fw-bold fs-3 my-3">Other Matches</h1>
                @if ($schedule != null)
                    @foreach ($schedule as $index => $value)
                        @php
                            $kickoff = Carbon\Carbon::parse($value['kickoff'])->format('Y-m-d H:i');
                        @endphp
                        <div class="match-box mb-4 p-3 rounded shadow"
                            style="background: linear-gradient(to left, rgba(0, 75, 117,  {{ 1 - $index * 0.05 }}), rgba(52, 61, 135,  {{ 1 - $index * 0.05 }}));">
                            <div class="match">
                                <div class="card-responsive">
                                    <p class="fw-bold fs-4 text-white m-0">{{ $value['home_team']['name'] }}</p>
                                    <p class="fw-bold fs-4 text-white m-0">{{ $value['away_team']['name'] }}</p>
                                    <div class="d-flex gap-2 align-items-center">
                                        <i class="far fa-clock"></i>
                                        <p class="text-white m-0">{{ $kickoff }}</p>
                                    </div>
                                </div>

                                <div class="team-container">
                                    <div class="team-name">
                                        <p class="fw-bold fs-4 text-white m-0">{{ $value['home_team']['name'] }}</p>
                                    </div>
                                    <img src="{{ asset('storage/logo/' . $value['home_team']['logo']) }}"
                                        alt="{{ $value['home_team']['name'] }} logo" class="img-fluid team-logo">
                                </div>
                                <p class="text-white fs-3 fw-bold">VS</p>
                                <div class="team-container">
                                    <img src="{{ asset('storage/logo/' . $value['away_team']['logo']) }}"
                                        alt="{{ $value['away_team']['name'] }} logo" class="img-fluid team-logo">
                                    <div class="team-name">
                                        <p class="fw-bold fs-4 text-white m-0 p-0">{{ $value['away_team']['name'] }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="kickoff">
                                <i class="far fa-clock"></i>
                                <p class="m-0">{{ $kickoff . ' WIB' }}</p>
                            </div>
                            <div class="d-flex align-items-center gap-2 text-white">
                                <div class="location">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <p class="m-0">{{ $value['location'] }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="d-flex justify-content-center my-4">
                        {{ $fixtures->links('pagination::bootstrap-4') }}
                    </div>
                @else
                    <div class="d-flex justify-content-center align-items-center w-100 p-2" id="no-schedule">
                        <p class="text-center text-white fw-bold fs-4">Tidak ada jadwal</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
