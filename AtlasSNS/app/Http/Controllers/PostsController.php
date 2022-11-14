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
    public function index(){
        return view('posts.index');
    }
    public function followlist(){
        return view('follows.followList');
    }
    public function followerlist(){
        return view('follows.followerList');
    }

    public function create()
    {
        return view('posts/create');
    }

    // 投稿内容登録処理
    public function store(Request $request)
    {
        $posts = new Post;
        // $posts->id = $request->id;
        $posts->user_id = $request->user_id;
        $posts->post = $request->post;
        $posts->save();
        return redirect('/post');
    }

    // DBからpostのデータを取得し、withの中に渡したい名前を以下の形式のように同じ名前でならべる。
        public function list()
    {
        $posts = Post::get();

        return view('posts.create')->with([
            'posts'=> $posts
        ]);
    }

    /**
     * 編集画面の表示
     */
    public function edit($id)
    {
        $post = Post::find($id);

        return view('posts.edit', compact('post'));
    }
    // 編集更新処理
    public function update(Request $request, $id)
    {
        $posts = post::find($id);
        $updatepost = $this->posts->updateBook($request, $posts);

        return redirect()->route('/list');
    }
}
