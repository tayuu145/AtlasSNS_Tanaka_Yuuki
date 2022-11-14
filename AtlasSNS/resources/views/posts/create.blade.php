@extends('layouts.login')

@section('content')
<div style="width:50%; margin: 0 auto; text-align:center;">
  <form action="/newpost" method="POST" class="toukou">
    @csrf
    <!-- <div>
            名前：
            <input name="id" placeholder="ID"/>
        </div> -->
    <div>
      会員番号：
      <input name="user_id" placeholder="番号" />
    </div>
    <!-- <div>
            タイトル：
            <input name="title" placeholder="タイトルの入力欄"/>
        </div> -->
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
                <div>{{ $post->user_id }}</div>
              </td>
              <!-- 投稿詳細 -->
              <td class="table-text">
                <div>{{ $post->post }}</div>
              </td>
              <td>
                <div><td><a href="{{ route('post.edit', ['id'=>$post->post]) }}" class="btn btn-info">編集</a></td></div>
              </td>

          </tr>
        @endforeach
     </tbody>
    </table>
  </div>
</div>
@endif

@endsection
