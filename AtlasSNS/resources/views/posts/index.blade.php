@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>


<!-- index移動作成中 -->
<div style="width:50%; margin: 0 auto; text-align:center;">
  <form action="/newpost" method="POST" class="toukou">
    @csrf
    <div>
      <!-- かくして、ログインユーザー名おくるよ -->
      <input type="hidden" name="username" value="{{Auth::user()->username}}" />
    </div>
    <div>
      <textarea name="post" placeholder="内容の入力"></textarea>
    </div>
    <button>送信</button>
  </form>
</div>
<!-- 全ての投稿リスト -->
@if (count($posts) > 0)
<div class="card-body">
  <div class="card-body">
    <table class="table table-striped task-table">
      <!-- テーブルヘッダ -->
      <thead>
        <th>投稿一覧</th>
        <th> </th>
      </thead>
      <!-- テーブル本体 -->
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <!-- 投稿ID -->
          <td class="table-text">
            <div>{{ $post->username }}</div>
          </td>
          <!-- 投稿詳細 -->
          <td class="table-text">
            <div>{{ $post->post }}</div>
          </td>
          <td>
            <div>
          <td><a href="{{ route('post.edit', ['id'=>$post->post]) }}" class="btn btn-info">編集</a></td>
  </div>
  </td>

  </tr>
  @endforeach
  </tbody>
  </table>
</div>
</div>
@endif


@endsection
