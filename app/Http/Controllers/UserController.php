<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $user = User::find(auth()->user()->id);
        return view('profile.profile', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('profile.editProfile', [
            'user' => $user
        ]);
    }

    public function update(Request $request, $id)
{
    $user = User::findOrFail($id);
    ($user->profile_picture) ? $fileName = $user->profile_picture : '';

    if ($request->hasFile('profile_picture')) {
        $extension = $request->file('profile_picture')->getClientOriginalExtension();
        $fileName = "profile_picture".'-'. now()->timestamp . '.' . $extension;
        $request->file('profile_picture')->storeAs('profile', $fileName);
    }

    $newData = $request->all();
    $newData['profile_picture'] = $fileName;
    $user->update($newData);

    return redirect('/profile');
}

}
