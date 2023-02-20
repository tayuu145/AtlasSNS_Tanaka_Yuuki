@extends('layouts.login')

@section('content')



<div class="post-in">
  <form action="/newpost" method="POST" class="toukou">
    @csrf
    <div>
      <!-- かくして、ログインユーザー名おくるよ -->
      <input type="hidden" name="user_id" value="{{Auth::user()->id}}" />
      <img src="{{ asset(Auth::user()->images) }}" class="post-image" width="45" height="45">
    </div>
    <div>
      <textarea class="text-eria" name="post" placeholder="投稿内容を入力してください。"></textarea>
    </div>
    <button class="button-post"><img src="images\post.png" class="post-btn"></button>
  </form>
</div>
<!-- 全ての投稿リスト -->
@if (count($posts) > 0)
<div class="card-body">
  <div class="card-body">
    <table class="table-eria">
      <!-- テーブルヘッダ -->
      <thead>
        <th>投稿一覧</th>
        <th> </th>
      </thead>
      <!-- テーブル本体 -->
      <tbody>
        @foreach ($posts as $post)
        <tr>
          <div class="post-box">
            <!-- 投稿ID -->
            <td class="table-text">
              <div><a href="{{ $post->user_id }}">{{ $post->user_id }}</a> </div>
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
                <a class="js-modal-open" href="" post="{{ $post->post }}" post_id="{{ $post->id }}"><img src="images/edit.png" width="30" height="30"></a>
              </div>

              <!-- < !--モーダルの中身 -->
              <div class="modal js-modal">
                <div class="modal__bg js-modal-close"></div>
                <div class="modal__content">
                  <!-- {/* 　　↓ここで飛ばしたいリンクに　　nameや書いてないところをかく */} -->
                  <form action="{{ route('update', ['id' => $post->id]) }}" method="POST">
                    <textarea name="update-text" class="modal_post"></textarea>
                    <input type="hidden" name="update-id" class="modal_id" value="">
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

                <button type="submit" class="btn btn-danger"><img src="images/trash.png" width="30" height="30"></button>
              </form>
            </td>
          </div>
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
