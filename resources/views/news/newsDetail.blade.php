@extends('layouts.mainLayout')

@section('title', $news->title)

@section('css', '/css/news/news-style.css')
@section('js', '/js/comment.js')

@section('content')
    <div class="container mt-5 col-lg-7 col-md-7 col-sm-12 bg-light p-5 shadow">
        <div id="news">
            <h1 class="news-title-main">{{ $news->title }}</h1>
            <p class="news-date-main">{{$news->admin->name.' - '.$news->created_at }}</p>
            <img src="{{ asset('storage/thumbnails/' . $news->thumbnail) }}" alt="{{ $news->title }}" class="news-image-main">
            <p class="news-content-main">{!! nl2br(e($news->content)) !!}</p>
        </div>

        <div id="comments">
            <h1 class="comment-title-main">Add Comment</h1>
            <div class="comment-input-box">
                <form action="/news-comment/{{ $news->id }}" method="POST" style="width: 100%"
                    class="d-flex justify-content-center">
                    <div class="profile-picture-comment">
                        @if (auth()->user()->profile_picture == null)
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                class="profile-image-comment">
                        @else
                            <img src="{{ asset('storage/profile/' . auth()->user()->profile_picture) }}" alt=""
                                class="profile-image-comment">
                        @endif
                    </div>
                    <input type="text" class="comment-input" placeholder="Tulis Komentar..." name="comment">
                    @csrf
                    <button class="comment-button"><i class="fas fa-paper-plane" style="height: 50px; width: 50px"></i>
                    </button>
                </form>
            </div>

            <h1 class="comment-subtitle-main">Comments</h1>
            @foreach ($news->comments as $comment)
                <div class="comment">
                    <div class="profile-picture-comment">
                        @if ($comment->users->profile_picture == null)
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                class="profile-image-comment">
                        @else
                            <img src="{{ asset('storage/profile/' . $comment->users->profile_picture) }}" alt=""
                                class="profile-image-comment">
                        @endif
                    </div>
                    <div class="comment-content-box">
                        <p class="comment-name">{{ $comment->users->name }}</p>
                        <p class="comment-content">{{ $comment->comment }}</p>
                        <div class="d-flex gap-3">
                            <p class="comment-reply" data-comment-id="{{ $comment->id }}">Reply</p>
                            <p class="see-replies" data-comment-id="{{ $comment->id }}">See Replies</p>
                        </div>
                    </div>
                </div>
                <div class="reply-box" data-comment-id="{{ $comment->id }}">
                    <form action="/news-comment/{{ $comment->id }}/reply" method="POST">
                        @csrf
                        <input type="text" name="reply" placeholder="Balas Komentar..." class="comment-reply-input">
                        <button class="comment-button" type="submit"><i class="fas fa-paper-plane"
                                style="height: 50px; width: 50px"></i> </button>
                    </form>
                </div>
                <div class="replies" data-comment-id="{{ $comment->id }}">
                    @if ($comment->replies->count() == 0)
                        <p class="fw-bold fs-5 text-center">Tidak Ada Balasan</p>
                    @else
                        <p class="fw-bold fs-5">Balasan</p>
                        @foreach ($comment->replies as $reply)
                            <div class="d-flex justify-content-end gap-3 mb-2">
                                <div>
                                    <p class="comment-name">{{ $reply->user->name }}</p>
                                    <p class="comment-content">{{ $reply->reply }}</p>
                                </div>
                                <div class="profile-picture-comment">
                                    @if ($reply->user->profile_picture == null)
                                    <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                        class="profile-image-comment">
                                    @else
                                    <img src="{{ asset('storage/profile/' . $reply->user->profile_picture) }}" alt=""
                                        class="profile-image-comment">
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="mb-5"></div>
@endsection
