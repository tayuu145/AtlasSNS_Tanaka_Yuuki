<?php

namespace App\Http\Controllers;

use App\Follow;
use Illuminate\Http\Request;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        return view('follows.followList');
    }
    public function followerList()
    {
        return view('follows.followerList');
    }

    public function follow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);

        // $followCount = count(Follow::where('following_id')->get());
        if (!$is_following) {
            // フォローしていなければフォローする
            $follower->follow($id);
            return back();
            // ->with('followCount', $followCount);
        }
    }

    // フォロー解除
    public function unfollow($id)
    {
        $follower = auth()->user();
        // フォローしているか
        $is_following = $follower->isFollowing($id);
        if ($is_following) {
            // フォローしていればフォローを解除する
            $follower->unfollow($id);
            return back();
        }
    }
}
