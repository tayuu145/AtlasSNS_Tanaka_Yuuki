<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/home', 'HomeController@index')->name('home');

//Auth::routes();

// k
//ログアウト中のページ
Route::get('/login', 'Auth\LoginController@login');
Route::post('/login', 'Auth\LoginController@login');

Route::get('/register', 'Auth\RegisterController@register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/added', 'Auth\RegisterController@added');
Route::post('/added', 'Auth\RegisterController@added');

//ログイン中のページ
Route::get('/top','PostsController@index')->middleware('auth');

Route::get('/profile','UsersController@profile')->middleware('auth');
// Route::get('/profile','UsersController@profile');
Route::get('/logout','Auth\LoginController@logout')->middleware('auth');

// ユーザ検索画面に
Route::get('/search','UsersController@search')->middleware('auth');
//  検索処理
Route::get('/searching','UsersController@searching')->name('posts.searching');

Route::get('/follow-list','PostsController@followlist')->middleware('auth');
Route::get('/follower-list','PostsController@followerlist')->middleware('auth');

Route::post('/newpost','PostsController@store')->name('posts.store');

// Route::get('/bss', 'PostsController@postlist');

// 投稿編集 今やっている
Route::get('/edit/{id}', 'PostsController@edit')->name('post.edit');
// 編集更新ボタン押した先
Route::get('/update/{id}', 'PostsController@update')->name('post.update');

// フォロー機能
Route::post('/users/{id}/follow','FollowsController@follow')->name('follow');
Route::delete('/users/{id}/unfollow','FollowsController@unfollow')->name('unfollow');


// 第一引数の該当URLになると第二引数が起動する。そこにアクセス確認制限をつける場合->middleware('auth');
