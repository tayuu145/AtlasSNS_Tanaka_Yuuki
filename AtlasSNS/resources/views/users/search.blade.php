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
      </tr>
    @endforeach
  </tbody>
  @endif
</div>

@endsection
