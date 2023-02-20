@extends('layouts.logout')

@section('content')

@if ($errors->any())
<div class="alert alert-danger">
	<ul>
		<!-- ↓送られたerror名 -->
		@foreach ($errors->all() as $validator)
		<li>{{ $validator }}</li>
		@endforeach
	</ul>
</div>
@endif

{!! Form::open(['url' => '/register']) !!}

<h2 class="senter">新規ユーザー登録</h2>

{{ Form::label('user name') }}
{{ Form::text('username',null,['class' => 'input']) }}

{{ Form::label('mail adress') }}
{{ Form::text('mail',null,['class' => 'input']) }}

{{ Form::label('password') }}
{{ Form::text('password',null,['class' => 'input']) }}

{{ Form::label('password-confirm') }}
{{ Form::text('password-confirm',null,['class' => 'input']) }}

{{ Form::submit('登録',['class' => 'login-b']) }}

<p><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}




@endsection
