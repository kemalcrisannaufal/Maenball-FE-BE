@extends('layouts.mainLayout')

@section('title', 'Berita')

@section('css', '/css/news/news-main-style.css')

@section('content')
    @if (count($news) > 0)
        @php
            $list_news = $news->reverse();
            $latest_news = $list_news->first();
            $side_news = $list_news->slice(1, 3);
            $news = $list_news->slice(4);
        @endphp

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8" id="latest">
                    <p class="fw-bold fs-3 mb-3">News</p>
                    <a href="/news/{{ $latest_news->id }}">
                        <div class="latest-news-box">
                            <img src="{{ asset('storage/thumbnails/' . $latest_news->thumbnail) }}"
                                alt="{{ $latest_news->title }}" class="img-news-latest">
                            <h4 class="latest-news-title">{{ $latest_news->title }}</h4>
                        </div>
                    </a>
                </div>
                @if (count($side_news) > 0)
                <div class="col-md-4">
                    <h1 class="fw-bold fs-3 mb-3">Latest News</h1>
                    <div class="vertical-news-box">
                        @foreach ($side_news as $value)
                            <a href="/news/{{ $value->id }}">
                                <div class="news-side-box">
                                    <img src="{{ asset('storage/thumbnails/' . $value->thumbnail) }}" alt=""
                                        class="news-img">
                                    <p class="news-title">{{ $value->title }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
                @endif
            </div>
            <hr>
            @if (count($news) > 0)
            <div class="row">
                <h1 class="fw-bold fs-3">More News</h1>
                <div class="horizontal-news-box">
                    @foreach ($news as $value)
                        <a href="/news/{{ $value->id }}">
                            <div class="news-box">
                                <img src="{{ asset('storage/thumbnails/' . $value->thumbnail) }}" alt=""
                                    class="news-img">
                                <p class="news-title">{{ $value->title }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>

    @endif

    <div class="mb-5"></div>

@endsection
