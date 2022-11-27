@extends('layouts.login')

@section('content')
<div>
  <form action="{{ route('posts.searching') }}" method="GET">
    @csrf
    <input type="text" name="keyword" value="@if (isset( $keyword ))  @endif" class="form-control" placeholder="名前を入力してください">
    <input type="submit" value="検索">
  </form>
  @if(!empty($users))
  <tbody>
    @foreach($users as $user)
      <tr>
          <td>{{ $user->id }}</td>
          <td>{{ $user->username }}</td>
          <td>{{ $user->mail }}</td>
          <td>{{ $user->created_at->format('Y/m/d') }}</td>
          <td>{{ $user->updated_at->format('Y/m/d') }}</td>
          <td>

          @if (auth()->user()->isFollowed($user->id))
            <div class="px-2">
              <span class="px1 bg-secondary text-light">フォローされています</span>
            </div>
          @endif
          <div class="d-flex justify-content-end flex-grow-1">
                @if (Auth::user()->isFollowing($user->id))
                  <form action="{{ route('unfollow', ['id' => $user->id]) }}" method="POST">
                      {{ csrf_field() }}
                      {{ method_field('DELETE') }}

                    <button type="submit" class="btn btn-danger">フォロー解除</button>
                  </form>
                @else
                  <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
                      {{ csrf_field() }}

                    <button type="submit" class="btn btn-primary">フォローする</button>
                  </form>
                @endif
          </div>
          </td>
      </tr>
    @endforeach
  </tbody>
  @endif
</div>

@endsection
