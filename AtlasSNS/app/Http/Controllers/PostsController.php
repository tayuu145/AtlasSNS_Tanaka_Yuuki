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

        return view('posts.index')->with([
            'posts' => $posts
        ]);
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
        $posts->username = $request->username;
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
    public function update(Request $request, $id)
    {
        $post = post::find($id);
        $post->update($request->only(['post']));

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
