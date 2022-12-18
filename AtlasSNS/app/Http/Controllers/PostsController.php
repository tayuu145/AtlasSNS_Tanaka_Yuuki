<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use Auth;
use Validator;

class PostsController extends Controller
{
    //
    public function index()
    {
        $posts = Post::get();
        $user = User::get();

        return view('posts.index', compact('posts', 'user'));
    }

    public function followlist()
    {
        return view('follows.followList');
    }
    public function followerlist()
    {
        return view('follows.followerList');
    }

    public function create()
    {
        return view('posts/create');
    }

    // 投稿内容登録処理 <wakaranai> </wakaranai>
    public function store(Request $request)
    {
        // postsテーブルの情報を変数に格納
        $posts = new Post;
        // $posts->id = $request->id;
        // $posts→カラム名＝リクエストしたpostをいれる
        $posts->user_id = $request->user_id;
        $posts->post = $request->post;
        // 覚える全体
        $posts->save();
        return redirect('/top');
    }

    // // DBからpostのデータを取得し、withの中に渡したい名前を以下の形式のように同じ名前でならべる。
    //     public function list()
    // {
    //     $posts = Post::get();

    //     return view('posts.create')->with([
    //         'posts'=> $posts
    //     ]);
    // }

    /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $posts = Post::get();

        return view('posts.index', compact('post', 'posts'));
    }
    // 編集更新処理
    public function update(Request $request)
    {
        // 1つ目の処理        ↓nameが入る
        $id = $request->input('update-id');
        $up_post = $request->input('update-text');
        // 2つ目の処理　　引数左カラムに右変数に更新(↓uodateによって)
        Post::where('id', $id)->update(['post' => $up_post]);
        // 3つ目の処理
        return redirect('/top');
    }
    // 投稿削除処理
    public function delete($id)
    {
        //   このIDがあるかpostテーブルから取得し。変数に格納
        $item = Post::findOrFail($id);
        $item->delete();
        return redirect('/top');
    }
}
