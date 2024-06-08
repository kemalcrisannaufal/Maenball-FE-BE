<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\LikedVideo;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::get();

        return view('highlight.video', [
            'videos' => $videos
        ]);
    }

    public function create()
    {
        return view('highlight.admin.addVideo');
    }

    public function store(Request $request)
    {
        $fileName = '';
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = 'thumbnail-'. now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('videos/thumbnails', $fileName);
        }

        $newData = $request->all();
        $newData['thumbnail'] = $fileName;
        $newData['admin_id'] = auth()->user()->id;
        $video = Video::create($newData);
        return redirect('/admin/list-highlight');
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        $videos = Video::whereNotIn('id', [$id])->get();
        return view('highlight.videoDetail', [
            'video' => $video,
            'videos' => $videos
        ]);
    }

    public function list()
    {
        $videos = Video::with('admin')->get();
        return view('highlight.admin.listVideo', [
            'videos' => $videos
        ]);
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('highlight.admin.editVideo', [
            'video' => $video
        ]);
    }

    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);
        $fileName = $video->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = "thumbnail".'-'. now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('videos/thumbnails', $fileName);
        }

        $newData = $request->all();
        $newData['thumbnail'] = $fileName;
        $newData['admin_id'] = auth()->user()->id;
        $video->update($newData);
        return redirect('/admin/list-highlight');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);
        $video->delete();
        return redirect('/admin/list-highlight');
    }

    public function like($id)
    {

        $user_id = auth()->user()->id;
        $exists = LikedVideo::where('user_id', $user_id)->where('video_id', $id)->exists();
        if ($exists) {
            LikedVideo::where('user_id', $user_id)->where('video_id', $id)->delete();
            return response()->json(['success' => true, 'message' => 'Video unliked successfully']);
        } else {
            $likedVideo = new LikedVideo();
            $likedVideo->video_id = $id;
            $likedVideo->user_id = $user_id;
            $likedVideo->save();
            return response()->json(['success' => true, 'message' => 'Video liked successfully']);
        }
    }

    public function likedVideos()
    {
        $user_id = auth()->user()->id;
        $liked_videos = LikedVideo::where('user_id', $user_id)->get();
        return view('highlight.likedVideos', [
            'liked_videos' => $liked_videos
        ]);
    }

}
