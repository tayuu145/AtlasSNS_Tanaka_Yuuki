@extends('layouts.login')

@section('content')
<div class="search-aria">
  <form action="{{ route('posts.searching') }}" method="GET">
    @csrf
    <input type="search" name="search" value="@if (isset($search)) {{ $search }} @endif" class="form-control" placeholder="ユーザ名">
    <input type="submit" value="検索" class="submit-search">
  </form>
</div>
<div class="search-menber">
  @if(!empty($users))
  <tbody>
    @foreach($users as $user)
    <div class="margin10 yokonarabi-search">
      <tr>
        <td><a href="{{ route('userprofile', ['id' => $user->id]) }}"><img src="{{ asset($user->images) }}" width="45" height="45"></a></td>
        <td>　{{ $user->username }}</td>

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

              <button type="submit" class="btn-f btn-follow">フォロー解除</button>
            </form>
            @else
            <form action="{{ route('follow', ['id' => $user->id]) }}" method="POST">
              {{ csrf_field() }}

              <button type="submit" class="btn-f btn-followed">フォローする</button>
            </form>
            @endif
          </div>
        </td>
      </tr>
    </div>
    @endforeach
  </tbody>
  <!-- @else -->

  @endif
</div>


@endsection
