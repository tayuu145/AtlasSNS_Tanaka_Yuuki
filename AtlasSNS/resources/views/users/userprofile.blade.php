@extends('layouts.login')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザ編集</div>
        <div class="card-body">
          <!-- 重要な箇所ここから -->

          @csrf
          <div class="userprofile">
            <p><img src="{{ asset($users->images) }}" class="icon"></p>
            <div class="userprofile-name">
              <p class="p-magi30">name:　　　 {{$posts->user->username}}</p>
              <p class="p-magi30">　bio: 　　{{$posts->user->bio}}</p>
            </div>
            @if (auth()->user()->isFollowed($users->id))
            @endif
            <div class="d-flex justify-content-end flex-grow-1">
              @if (Auth::user()->isFollowing($users->id))
              <form action="{{ route('unfollow', ['id' => $users->id]) }}" method="POST">
                {{ csrf_field() }}
                {{ method_field('DELETE') }}

                <button type="submit" class="btn btn-danger">フォロー解除</button>
              </form>
              @else
              <form action="{{ route('follow', ['id' => $users->id]) }}" method="POST">
                {{ csrf_field() }}

                <button type="submit" class="btn btn-primary">フォローする</button>
              </form>
              @endif
            </div>
          </div>


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
                  <div><a href=""><img src="{{ asset($post->user->images) }}" width="45" height="45"></a> </div>
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
        <br />
        <input type="submit" value="更新" />
        <!-- 重要な箇所ここまで -->
      </div>
    </div>
  </div>
</div>
</div>

@endsection
