@extends('layouts.mainLayout')

@section('title', 'Liked Videos')

@section('css', '/css/highlight/liked-video-style.css')

@section('content')

    <div class="m-5">
        <div class="title-box">
            <h1 class="fs-2">Videos You Like</h1>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="img-box">
                    <img src="images/messi.png" alt="" width="450">
                </div>
            </div>

            <div class="col-md-8">

                @if ($liked_videos->count() == 0)
                    <div class="d-flex justify-content-center align-items-center w-100 p-5 text-white" style="background: linear-gradient(to left, rgba(0, 75, 117, 1), rgba(52, 61, 135, 1))">
                        <p class="text-center fs-3">Tidak ada video yang anda sukai</p>
                    </div>
                @else
                    <div class="d-flex flex-wrap gap-2">
                        @foreach ($liked_videos as $video)
                            <a href="/highlight/{{ $video->video->id }}">
                                <div class="video-box">
                                    <img src="{{ asset('storage/videos/thumbnails/' . $video->video->thumbnail) }}"
                                        alt="" class="video-thumbnail">
                                </div>
                            </a>
                        @endforeach
                    </div>

                @endif
            </div>

        </div>
    </div>

@endsection
