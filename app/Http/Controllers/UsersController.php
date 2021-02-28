<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    public function show($id)
    {
        $user = User::where('id', $id)->firstOrFail();

        $bids = Bid::where('user_id', $id)
            ->orderBy('id', 'desc')
            ->orderBy('created_at', 'desc')
            ->get();;

        return view('user', [
            'user' => $user, 'bids' => $bids
        ]);
    }

    public function updateAvatar(Request $request, $id) {
        Auth::user();
        request()->validate([
            'avatar' => 'required',
        ]);
        $user = User::where('id', $id)->firstOrFail();
//        $user->avatar = request('avatar');
//
//        $filename = request('avatar')->getClientOriginalName();
//        request('avatar')->move(public_path('uploads/avatars'), $filename);
//
//        $user->update();

        if ($request->hasFile('avatar')) {
            $avatar = $request->file('avatar');
            $filename = time() . $avatar->getClientOriginalName();
            $avatar->move(public_path('/uploads/avatars'),  $filename);

            $user->avatar = $filename;
            $user->update();
        }

        return redirect('/user/' . $id);
    }
}
