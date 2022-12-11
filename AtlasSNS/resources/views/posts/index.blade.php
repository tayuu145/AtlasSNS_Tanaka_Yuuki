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
          <td>
            <div class="content">
              <!-- 投稿の編集ボタン -->
              <!-- 　　　　　　　　　　{/* ↓押したときにリンクに飛ばしたくない編集できてないから */} -->
              <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}">編集</a>
            </div>

            <!-- < !--モーダルの中身 -->
            <div class="modal js-modal">
              <div class="modal__bg js-modal-close"></div>
              <div class="modal__content">
                <!-- {/* 　　↓ここで飛ばしたいリンクに　　nameや書いてないところをかく */} -->
                <form action="{{ route('update', ['id' => $post->id]) }}" method="POST">
                  <textarea name="update-text" class="modal_post"></textarea>
                  <input type="hidden" name="update-post" class="modal_id" value="update-text">
                  <input type="submit" value="更新">
                  {{ csrf_field() }}
                </form>
                <a class="js-modal-close" href="">閉じる</a>
              </div>
            </div>
          <td>
            <!-- 投稿削除 -->
            <!--↓'id'は箱の名前　↓＄post→idは変数ポストの中のID　  -->
            <form action="{{ route('post.delete', ['id' => $post->id]) }}" method="POST">
              {{ csrf_field() }}
              {{ method_field('DELETE') }}

              <button type="submit" class="btn btn-danger">削除</button>
            </form>
          </td>
        </tr>
        @endforeach</td>

  </div>
  </td>

  </tbody>
  </table>
</div>
</div>
@endif


@endsection
