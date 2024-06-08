<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
    <script src=@yield('js')></script>
    @yield('script')
    <link rel="stylesheet" href='/css/style.css'>
    <link rel="stylesheet" href=@yield('css')>
    <title>@yield('title')</title>
    <script>
        document.getElementById('hamburger-icon').addEventListener('click', function() {
            var nav = document.getElementById('nav');
            nav.classList.toggle('active');
        });
    </script>
</head>

<body>
    <div class="page-container">
        <div class="container-fluid navbar">
            <a href="/dashboard"><img src="{{ asset('/images/ligachamp.png') }}" alt="" id="logo"></a>
            <div class="nav">
                <ul class="d-flex gap-5 align-items-center" id="nav">
                    <li><a href="/dashboard">Dashboard</a></li>
                    <li><a href="/news">News</a></li>
                    <li><a href="/score">Score</a></li>
                    <li><a href="/schedule">Schedule</a></li>
                    <li><a href="/highlight">Highlight</a></li>
                    <li class="dropdown" id="profile">
                        <div class="profile">
                            @if (auth()->user()->profile_picture == null)
                                <a href="javascript:void(0)"><img
                                        src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt=""
                                        width="50" height="50"></a>
                            @else
                                <a href="javascript:void(0)"><img
                                        src="{{ asset('storage/profile/' . auth()->user()->profile_picture) }}"
                                        alt="" width="50" height="50"></a>
                            @endif
                        </div>
                        <div class="dropdown-content">
                            <a href="/profile">Profile</a>
                            <a href="/liked-videos">Liked Video</a>
                            <a href="/logout">Logout</a>
                        </div>
                    </li>
                </ul>
                <div class="dropdown mt-3" id="profile-mobile">
                    <div class="profile">
                        @if (auth()->user()->profile_picture == null)
                            <a href="javascript:void(0)"><img
                                    src="https://cdn-icons-png.flaticon.com/512/3135/3135715.png" alt=""
                                    width="50" height="50"></a>
                        @else
                            <a href="javascript:void(0)"><img
                                    src="{{ asset('storage/profile/' . auth()->user()->profile_picture) }}"
                                    alt="" width="50" height="50"></a>
                        @endif
                    </div>
                    <div class="dropdown-content">
                        <a href="/profile">Profile</a>
                        <a href="/logout">Logout</a>
                    </div>
                </div>
            </div>
        </div>

        @yield('content')
    </div>


    <div class="footer">
        <p>Made By Group D</p>
        <p>Copyright &copy; 2024. All Rights Reserved.</p>
    </div>

</body>

</html>
