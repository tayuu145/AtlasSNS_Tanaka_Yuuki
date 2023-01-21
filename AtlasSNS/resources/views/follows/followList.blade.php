@extends('layouts.login')

@section('content')


<div class="card-body">
  <div class="card-body">
    <table>
      <!-- 繰り返しフォローしている人のアイコンを表示させる　フォローしている人に限る処理はページ開く前のコントローラー側で -->
      @foreach ($posts as $post)
      <div>
        <p><a href="/userprofile"><img src="{{ $post->images }}" width="25" height="25"></a></p>
      </div>

      @endforeach
    </table>
    <table class="table table-striped task-table">
      <!-- テーブルヘッダ -->
      <thead>
        <th>つぶやき一覧</th>
        <th> </th>
      </thead>
      <!-- テーブル本体 -->
      <tbody>
        @foreach ($posts as $post)
        <tr>

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
              <p> </p>
            </div>
          <td>

        </tr>
        @endforeach

  </div>
  </td>

  </tbody>
  </table>
</div>
</div>
@endsection
