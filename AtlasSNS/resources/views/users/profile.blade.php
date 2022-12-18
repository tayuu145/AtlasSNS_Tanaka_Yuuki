@extends('layouts.login')

@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">ユーザ編集</div>
        <div class="card-body">
          <!-- 重要な箇所ここから -->
          <form action="/profil_edit" method="get">
            @csrf
            <p>ID: {{Auth::user()->id}}</p>
            <input type="hidden" name="id" value="{{Auth::user()->id}}" />
            <p>user name</p>
            <input type="text" name="name" value="{{Auth::user()->username}}" />
            <p>mail adress</p>
            <input type="text" name="mail" value="{{Auth::user()->mail}}" />
            <p>password</p>
            <input type="password" name="password" value="{{Auth::user()->password}}" />
            <p>password comfirm</p>
            <input type="password" name="password-comfirm" value="" />
            <p>bio</p>
            <input type="text" name="bio" value="{{Auth::user()->bio}}" />
            <p>icon</p>
            <input type="file" name="icon" value="{{Auth::user()->images}}" />

            <br />
            <input type="submit" value="更新" />
          </form>
          <!-- 重要な箇所ここまで -->
        </div>
      </div>
    </div>
  </div>
</div>


@endsection
