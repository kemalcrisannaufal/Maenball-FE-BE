<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\SeasonController;
use App\Http\Controllers\FixtureController;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\NewsCommentController;

Route::get('/', function () {
    return redirect('/login');
    // return view('auth.login');
});

Route::get('/test', [APIController::class, 'getData']);

Route::get('/dashboard', [HomeController::class, 'index'])->middleware('auth:web');

Route::get('/register', [AuthController::class, 'register'])->middleware('guest');
Route::post('/register', [AuthController::class, 'registerProcess'])->middleware('guest');

Route::get('/login', [AuthController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login', [AuthController::class, 'loginProcess'])->middleware('guest');
Route::get('/logout', [AuthController::class, 'logout'])->middleware('auth:web,admin');

Route::get('/profile', [UserController::class, 'index'])->middleware('auth:web');
Route::get('/profile/edit/{id}', [UserController::class, 'edit'])->middleware('auth:web');
Route::patch('/profile/edit/{id}', [UserController::class, 'update'])->middleware('auth:web');

Route::get('/news', [NewsController::class, 'index'])->middleware('auth:web');
Route::get('/news/{id}', [NewsController::class, 'show'])->middleware('auth:web');

Route::post('/news-comment/{id}', [NewsCommentController::class, 'store'])->middleware('auth:web');
Route::post('/news-comment/{id}/reply', [NewsCommentController::class, 'storeReply'])->middleware('auth:web');

Route::get('/highlight', [VideoController::class, 'index'])->middleware('auth:web,admin');
Route::get('/highlight/{id}', [VideoController::class, 'show'])->middleware('auth:web,admin');
Route::post('/highlight/like/{id}', [VideoController::class, 'like'])->name('video.like')->middleware('auth:web');
Route::get('/liked-videos', [VideoController::class, 'likedVideos'])->middleware('auth:web');

Route::get('/schedule', [ScheduleController::class, 'index'])->middleware('auth:web');

Route::get('/score', [ScoreController::class, 'index'])->middleware('auth:web');

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.home');
    });

    Route::get('/add-news', [NewsController::class, 'create'])->middleware('auth:admin');
    Route::get('/list-news', [NewsController::class, 'list'])->middleware('auth:admin');
    Route::get('/news/edit/{id}', [NewsController::class, 'edit'])->middleware('auth:admin');
    Route::put('/news/edit/{id}', [NewsController::class, 'update'])->middleware('auth:admin');
    Route::delete('/news/delete/{id}', [NewsController::class, 'destroy'])->middleware('auth:admin');
    Route::post('/news', [NewsController::class, 'store'])->middleware('auth:admin');

    Route::get('/add-highlight', [VideoController::class, 'create'])->middleware('auth:admin');
    Route::get('/list-highlight', [VideoController::class, 'list'])->middleware('auth:admin');
    Route::delete('/highlight/delete/{id}', [VideoController::class, 'destroy'])->middleware('auth:admin');
    Route::get('/highlight/edit/{id}', [VideoController::class, 'edit'])->middleware('auth:admin');
    Route::put('/highlight/edit/{id}', [VideoController::class, 'update'])->middleware('auth:admin');
    Route::post('/highlight', [VideoController::class, 'store'])->middleware('auth:admin');

    Route::get('/list-teams', [TeamController::class, "index"])->middleware('auth:admin');
    Route::get('/add-team', [TeamController::class, "create"])->middleware('auth:admin');
    Route::post('/team', [TeamController::class, "store"])->middleware('auth:admin');

    Route::get('/list-seasons', [SeasonController::class, "index"])->middleware('auth:admin');
    Route::get('/add-season', [SeasonController::class, "create"])->middleware('auth:admin');
    Route::post('/season', [SeasonController::class, "store"])->middleware('auth:admin');

    Route::get('/list-fixtures', [FixtureController::class, "index"])->middleware('auth:admin');
    Route::get('/add-fixture', [FixtureController::class, "create"])->middleware('auth:admin');
    Route::post('/fixture', [FixtureController::class, "store"])->middleware('auth:admin');
    Route::get('/fixture/edit/{id}', [FixtureController::class, 'edit'])->middleware('auth:admin');
    Route::delete('/fixture/delete/{id}', [FixtureController::class, 'destroy'])->middleware('auth:admin');

    Route::get('/list-scores', [ScoreController::class, "indexAdmin"])->middleware('auth:admin');
    Route::post('/score/{id}', [ScoreController::class, "store"])->middleware('auth:admin');
    Route::delete('/score/delete/{id}', [ScoreController::class, "destroy"])->middleware('auth:admin');


});

Route::prefix('api')->group(function () {
    Route::get('/news', [APIController::class, 'getAllNews']);
    Route::get('/news/{id}', [APIController::class, 'news']);
    Route::post('/login', [APIController::class, 'login']);
    Route::get('/highlights', [APIController::class, 'getAllHighlights']);
    Route::get('/highlights/{id}', [APIController::class, 'highlight']);
});

