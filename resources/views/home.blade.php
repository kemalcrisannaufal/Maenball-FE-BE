@extends('layouts.mainLayout')

@section('title', 'Dashboard')

@section('css', '/css/home/home-style.css')

@section('js', '/js/dashboard.js')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-4 col-lg-4">
                <div id="standings-web">
                    <p class="fw-bold fs-3 mb-3">Standings</p>
                    @foreach ($standings as $value)
                        <div>
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th
                                                style="background-color: rgb(2, 60, 94);
                                            color: white;">
                                                Group {{ $value[0]['league_round'] }}</th>
                                            <th
                                                style="background-color: rgb(2, 60, 94);
                                            color: white;">
                                                Pts</th>
                                            <th
                                                style="background-color: rgb(2, 60, 94);
                                            color: white;">
                                                W</th>
                                            <th
                                                style="background-color: rgb(2, 60, 94);
                                            color: white;">
                                                D</th>
                                            <th
                                                style="background-color: rgb(2, 60, 94);
                                            color: white;">
                                                L</th>
                                            <th
                                                style="background-color: rgb(2, 60, 94);
                                            color: white;">
                                                Ga</th>
                                            <th
                                                style="background-color: rgb(2, 60, 94);
                                            color: white;">
                                                Gd</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 4; $i++)
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <img src="{{ $value[$i]['team_badge'] }}"
                                                            alt="{{ $value[$i]['team_name'] }}" width="30px"
                                                            height="30px">
                                                        {{ $value[$i]['team_name'] }}
                                                    </div>
                                                </td>
                                                <td>{{ $value[$i]['overall_league_PTS'] }}</td>
                                                <td>{{ $value[$i]['overall_league_W'] }}</td>
                                                <td>{{ $value[$i]['overall_league_D'] }}</td>
                                                <td>{{ $value[$i]['overall_league_L'] }}</td>
                                                <td>{{ $value[$i]['overall_league_GF'] }}</td>
                                                <td>{{ $value[$i]['overall_league_GA'] }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="mt-5">
                    <img src="images/maenbal.png" alt="">
                </div>
            </div>

            <div class="col-md-8 col-lg-8 col-sm-12" id="right-side">
                <p class="fw-bold fs-3 mb-3">Latest News</p>
                <div class="news-slider">
                    <button class="button prev">&#10094;</button>
                    <div class="news-wrapper">
                        @foreach ($latest_news as $news)
                            <div class="news-homepage">
                                <a href="/news/{{ $news->id }}">
                                    <img src="{{ '/storage/thumbnails/' . $news->thumbnail }}" alt="{{ $news->title }}"
                                        class="img-news">
                                </a>
                                <h4 class="news-title-homepage">{{ $news->title }}</h4>
                            </div>
                        @endforeach
                    </div>
                    <button class="button next">&#10095;</button>
                </div>

                @if (count($fixtures) > 0)
                    <div class="schedule-section">
                        <div class="d-flex justify-content-between mb-3">
                            <p class="fw-bold fs-4">Next Match</p>
                            <a href="/schedule" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                        </div>
                        @for ($i = 0; $i < count($fixtures); $i++)
                            @php
                                $color1 = 'rgb(' . (1 + $i * 15) . ', 109, 171)';
                                $color2 = 'rgba(' . (52 + $i * 15) . ', 61, 135, 1)';
                            @endphp
                            <div class="schedule-box"
                                style="background: linear-gradient(to left, {{ $color1 }}, {{ $color2 }} );">
                                <div class="d-flex align-items-center gap-4 w-100" style="color: ">
                                    <div class="versus-container">
                                        <div class="team home-team team-responsive">
                                            <p>{{ $fixtures[$i]['home_team']['name'] }}</p>
                                        </div>
                                        <div class="score score-responsive">
                                            <p class="mb-0">|</p>
                                            <p class="mb-0">VS</p>
                                            <p class="mb-0">|</p>
                                        </div>
                                        <div class="team away-team team-responsive">
                                            <p>{{ $fixtures[$i]['away_team']['name'] }}</p>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center gap-3">
                                        <i class="fas fa-clock"></i>
                                        <p>{{ $fixtures[$i]['kickoff'] }}</p>
                                    </div>
                                    <div class="stadium">
                                        <div
                                            class="d-flex justify-content-center align-items-center gap-3 location-stadium">
                                            <i class="fas fa-map-marker-alt"></i>
                                            <p>{{ $fixtures[$i]['location'] }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endfor
                    </div>
                @endif

                {{--
                @if (count($score) > 0)
                    <div class="d-flex justify-content-between mb-3 mt-3">
                        <p class="fw-bold fs-4">Last Matches</p>
                        <a href="/score" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                    </div>
                    @for ($i = 0; $i < count($score); $i++)
                        @php
                            $color1 = 'rgb(' . (1 + $i * 15) . ', 109, 171)';
                            $color2 = 'rgba(' . (52 + $i * 15) . ', 61, 135, 1)';
                        @endphp
                        <div class="schedule-box"
                            style="background: linear-gradient(to left, {{ $color1 }}, {{ $color2 }} );">
                            <div class="d-flex align-items-center gap-4 w-100">
                                <div class="versus-container">
                                    <div class="team home-team">
                                        <p>{{ $score[$i]['home_name'] }}</p>
                                    </div>
                                    <div class="score">
                                        <p class="score-text">{{ $score[$i]['score'] }}</p>
                                    </div>
                                    <div class="team away-team">
                                        <p>{{ $score[$i]['away_name'] }}</p>
                                    </div>
                                </div>

                                <div class="date-time">
                                    <div class="d-flex justify-content-center align-items-center gap-3 me-2">
                                        @php
                                            $utcTime = $score[$i]['date'] . ' ' . $score[$i]['scheduled'];
                                            $localTime = Carbon\Carbon::parse($utcTime)
                                                ->setTimezone('Asia/Jakarta')
                                                ->format('Y-m-d H:i');
                                        @endphp
                                        <i class="fas fa-clock"></i>
                                        <p>{{ $localTime }}</p>
                                    </div>
                                </div>
                                <div class="stadium">
                                    <div class="d-flex justify-content-center align-items-center gap-3 location-stadium">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <p>{{ $score[$i]['location'] }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
--}}

                <div class="highlight-section">
                    <div class="d-flex justify-content-between mb-3">
                        <p class="fw-bold fs-4">Highlights</p>
                        <a href="/highlight" class="fw-bold fs-4 text-decoration-none text-dark">View All</a>
                    </div>
                    <div>
                        @foreach ($highlights as $highlight)
                            <a href="/highlight/{{ $highlight->id }}">
                                <div class="highlight-box">
                                    <img src="{{ asset('storage/videos/thumbnails/' . $highlight->thumbnail) }}"
                                        alt="{{ $highlight->title }}" class="highlight-thumbnail">
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                <div id="standings-mobile">
                    <p class="fw-bold fs-4 mb-3">Standings</p>
                    @foreach ($standings as $value)
                        <div>
                            <div>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Group {{ $value[0]['league_round'] }}</th>
                                            <th>Pts</th>
                                            <th>W</th>
                                            <th>D</th>
                                            <th>L</th>
                                            <th>Ga</th>
                                            <th>Gd</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @for ($i = 0; $i < 4; $i++)
                                            <tr>
                                                <td>
                                                    <div class="d-flex gap-2">
                                                        <img src="{{ $value[$i]['team_badge'] }}"
                                                            alt="{{ $value[$i]['team_name'] }}" width="30px"
                                                            height="30px">
                                                        {{ $value[$i]['team_name'] }}
                                                        {{ $value[$i]['team_name'] }}
                                                    </div>
                                                </td>
                                                <td>{{ $value[$i]['overall_league_PTS'] }}</td>
                                                <td>{{ $value[$i]['overall_league_W'] }}</td>
                                                <td>{{ $value[$i]['overall_league_D'] }}</td>
                                                <td>{{ $value[$i]['overall_league_L'] }}</td>
                                                <td>{{ $value[$i]['overall_league_GF'] }}</td>
                                                <td>{{ $value[$i]['overall_league_GA'] }}</td>
                                            </tr>
                                        @endfor
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        <hr>
    </div>
@endsection
