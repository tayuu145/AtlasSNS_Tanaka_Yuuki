@extends('layouts.login')

@section('content')
<div class="card-body">
  <div class="card-body">

    <div class="yokonarabi senter-disp">
      <!-- 繰り返しフォローしている人のアイコンを表示させる　フォローしている人に限る処理はページ開く前のコントローラー側で -->
      <h2 class="font20">Follow List</h2>

      @foreach ($users as $user)
      <div>
        <p><a href="{{ route('userprofile', ['id' => $user->id]) }}"><img src="{{ asset($user->images) }}" width="40" height="40"></a></p>
      </div>
      @endforeach
    </div>
    <table class="table-eria">
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
            <div><a href="{{ route('userprofile', ['id' => $post->user_id]) }}">{{ $post->user_id }}</a> </div>
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
