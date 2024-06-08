@extends('layouts.mainLayout')

@section('title', 'Highlight')

@section('css', '/css/highlight/highlight-main-style.css')

@section('js', '/js/highlight/highlight.js')

@section('script')
    <script>
        $(document).ready(function() {
            $('.btn-like').click(function(e) {
                e.preventDefault();
                var button = $(this);
                var videoId = button.data('video-id');
                var url = button.data('url');
                var iconLove = button.find('.icon-love');

                $.ajax({
                    type: "POST",
                    url: url,
                    data: {
                        video_id: videoId,
                        _token: $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            iconLove.toggleClass(
                                'icon-love-liked');
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Error: " + status + " " + error);
                    }
                });
            });
        });
    </script>

@endsection

@section('content')
    @php
        $list_video = $videos->reverse();
        $side_video = $list_video->slice(0, 4);
        $rest_video = $list_video->slice(4);
    @endphp
    <div class="container mt-5 mb-3">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-12">
                <h1 class="fs-2 mb-3">Highlight</h1>
                <div>
                    <iframe src="{{ $video->url }}" title="YouTube video player" frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                        referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
                    <div class="main-video-description">
                        <div class="d-flex justify-content-between align-items-center">
                            <h1 class="fs-4">{{ $video->title }}</h1>
                            <div class="d-flex gap-3">
                                <form action="/highlight/like/{{ $video->id }}" method="POST">
                                    @php
                                        $isLiked = \App\Models\LikedVideo::where('user_id', auth()->id())
                                            ->where('video_id', $video->id)
                                            ->exists();
                                    @endphp
                                    <button class="btn-like" data-video-id="{{ $video->id }}"
                                        data-url="{{ route('video.like', ['id' => $video->id]) }}" type="button">
                                        <i class="fas fa-heart {{ $isLiked ? 'icon-love-liked' : 'icon-love' }}"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <p>{{ $video->description }}</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-12">
                <h1 class="fw-bold fs-3 mb-3">Other Highlights</h1>
                @foreach ($side_video as $video)
                    <a href="/highlight/{{ $video->id }}">
                        <div class="side-video mb-4">
                            <img class="img-side-video" src="{{ asset('storage/videos/thumbnails/' . $video->thumbnail) }}"
                                alt="{{ $video->title }}">

                        </div>
                    </a>
                @endforeach
            </div>
            <hr class="mt-5">

            @if (count($rest_video) > 0)
            <div class="row">
                <h1 class="fw-bold fs-3">More Highlight</h1>
                <div class="horizontal-highlight-box">
                    @foreach ($rest_video as $video)
                        <a href="/highlight/{{ $video->id }}">
                            <div class="highlight-box">
                                <img class="img-highlight" src="{{ asset('storage/videos/thumbnails/' . $video->thumbnail) }}"
                                    alt="{{ $video->title }}">
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
            @endif
        </div>
    </div>
@endsection
