<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::get();
        return view('news.news', [
            'news' => $news
        ]);
    }

    public function create()
    {
        return view('news.admin.addNews');
    }

    public function store(Request $request)
    {
        $fileName = '';
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = "thumbnail".'-'. now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('thumbnails', $fileName);
        }

        $newData = $request->all();
        $newData['thumbnail'] = $fileName;
        $newData['admin_id'] = auth()->user()->id;
        $news = News::create($newData);
        return redirect('/admin/list-news');
    }

    public function show($id)
    {
        $news = News::with(['comments.replies.user' => function ($query) {
            $query->orderBy('created_at', 'desc');
        }], 'admin')->findOrFail($id);
        return view('news.newsDetail', [
            'news' => $news
        ]);
    }

    public function list()
    {
        $news = News::paginate(10);
        return view('news.admin.listNews', [
            'news' => $news
        ]);
    }

    public function edit($id)
    {
        $news = News::findOrFail($id);
        return view('news.admin.editNews', [
            'news' => $news
        ]);
    }

    public function update($id, Request $request)
    {

        $news = News::findOrFail($id);
        $fileName = $news->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $extension = $request->file('thumbnail')->getClientOriginalExtension();
            $fileName = "thumbnail".'-'. now()->timestamp . '.' . $extension;
            $request->file('thumbnail')->storeAs('thumbnails', $fileName);
        }

        $newData = $request->all();
        $newData['thumbnail'] = $fileName;
        $newData['admin_id'] = auth()->user()->id;
        $news->update($newData);
        return redirect('/admin/list-news');
    }

    public function destroy($id)
    {
        $news = News::findOrFail($id);
        $news->delete();
        return redirect('/admin/list-news');
    }
}

