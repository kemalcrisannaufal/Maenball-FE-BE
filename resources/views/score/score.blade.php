@extends('layouts.mainLayout')

@section('title', 'Score')

@section('css', '/css/score/score-style.css')

@section('content')
    <div class="container mt-5">
        <div class="row d-flex justify-content-center">
            <div class="col-md-10">
                <div class="img-box">
                    <div id="img">
                        <img src="images/score.png" alt="" class="img">
                    </div>
                    <div class="d-flex justify-content-center align-items-center gap-3 text-white" id="main-score">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('storage/logo/' . $last_score['fixture']['home_team']['logo']) }}"
                                alt="" width="75">
                            <p class="text-center fw-bold fs-2">{{ $last_score['fixture']['home_team']['name'] }}</p>
                        </div>
                        <div class="text-center fw-bold fs-3">
                            <p>{{ $last_score['home_score'] . -$last_score['away_score'] }}</p>
                            <P class="text-white fw-bold fs-4">FT</P>
                        </div>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <img src="{{ asset('storage/logo/' . $last_score['fixture']['away_team']['logo']) }}"
                                alt="" width="75">
                            <p class="text-center fw-bold fs-2">{{ $last_score['fixture']['away_team']['name'] }}</p>
                        </div>
                    </div>
                    <div class="date-main-info">
                        <p class="fw-bold">UEFA Champions League</p>
                        @php
                            $kickoff = Carbon\Carbon::parse($last_score['fixture']['kickoff'])->format('Y-m-d H:i');
                            $kickoff_time = explode(' ', $kickoff);
                        @endphp
                        <p class="fw-bold">{{ $kickoff_time[0] }}</p>
                    </div>
                    <div class="additional-main-info">
                        <div class="d-flex gap-3 align-items-center">
                            <i class="far fa-clock"></i>
                            <p class="fw-bold">{{ $kickoff_time[1] . ' WIB' }}</p>
                        </div>
                        <div class="d-flex gap-3 align-items-center">
                            <i class="fas fa-map-marker-alt"></i>
                            <p class="fw-bold">{{ $last_score['fixture']['location'] }}</p>
                        </div>
                    </div>
                </div>

                <div class="container mt-3">
                    <p class="fw-bold fs-3 mb-2 text-dark">Result of the other matches</p>
                    <div class="row">
                        @foreach ($scores as $score)
                            <div class="col-md-6 mb-4">
                                <div class="score-main-box">
                                    <div class="score-box">
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="{{ asset('storage/logo/' . $score['fixture']['home_team']['logo']) }}"
                                                alt="" width="50">
                                            <div class="team-name">
                                                <p>
                                                    {{ $score['fixture']['home_team']['name'] }}
                                                </p>
                                            </div>
                                        </div>
                                        <div class="score-text">
                                            <p>
                                                {{ $score['home_score'] . '-' . $score['away_score'] }}</p>
                                        </div>
                                        <div class="d-flex flex-column justify-content-center align-items-center">
                                            <img src="{{ asset('storage/logo/' . $score['fixture']['away_team']['logo']) }}"
                                                alt="" width="50">
                                            <div class="team-name">
                                                <p>
                                                    {{ $score['fixture']['away_team']['name'] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2 p-2 gap-2">
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="far fa-clock"></i>
                                            @php
                                                $kickoff = Carbon\Carbon::parse($score['fixture']['kickoff'])->format(
                                                    'Y-m-d H:i',
                                                );
                                            @endphp
                                            <p>{{ $kickoff . ' WIB' }}</p>
                                        </div>
                                        <div class="d-flex gap-3 align-items-center">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>{{ $score['fixture']['location'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-center my-3">
                        {{ $list_scores->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
