@extends('layouts.login')

<!-- @section('title', 'LaravelPjt BBS 投稿の一覧ページ')
@section('keywords', 'キーワード1,キーワード2,キーワード3')
@section('description', '投稿一覧ページの説明文')
@section('pageCss')
<link href="/css/bbs/style.css" rel="stylesheet">
 @endsection

@include('layout.bbsheader') -->

@section('content')
<div class="table-responsive">
    <table class="table table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>カテゴリ</th>
            <th>作成日時</th>
            <th>名前</th>
            <th>件名</th>
            <th>メッセージ</th>
            <th>処理</th>
        </tr>
        </thead>
        <tbody id="tbl">
        @foreach ($forms as form)
            <tr>
                <td>{{ $form->id }}</td>
                <td>{{ $form->category->name }}</td>
                <td>{{ $form->created_at->format('Y.m.d') }}</td>
                <td>{{ $form->name }}</td>
                <td>{{ $form->subject }}</td>
                <td>{!! nl2br(e(Str::limit($post->message, 100))) !!}
                @if ($form->comments->count() >= 1)
                    <p><span class="badge badge-primary">コメント：{{ $form->comments->count() }}件</span></p>
                @endif
                </td>
                <td class="text-nowrap">
                    <p><a href="" class="btn btn-primary btn-sm">詳細</a></p>
                    <p><a href="" class="btn btn-info btn-sm">編集</a></p>
                    <p><a href="" class="btn btn-danger btn-sm">削除</a></p>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
