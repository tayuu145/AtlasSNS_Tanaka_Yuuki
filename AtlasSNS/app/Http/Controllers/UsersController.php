<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class UsersController extends Controller
{
    //
    public function profile()
    {

        return view('users.profile');
    }
    public function profiledit(Request $request)
    {
        $id = $request->input('id');
        $username = $request->input('name');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $icon = $request->input('icon');

        $update = [
            'username' => $username,
            'mail' => $mail,
            'password' => $password,
            'bio' => $bio,
            'images' => $icon,
        ];

        // 2つ目の処理　　引数左カラムに右変数に更新(↓uodateによって)
        User::where('id', $id)->update([$update]);
        return redirect('/top');
    }

    public function search()
    {
        return view('users.search');
    }

    public function searching(Request $request)
    {
        $search = $request->input('search');

        if (!empty($search)) {
            $_search = str_replace('　', ' ', $search);
            $_search = preg_replace('/\s(?=\s)/', '', $search);
            $_search = trim($search);

            $query = User::query();

            $query->where('username', 'LIKE', '%' . $search . '%');
            $users = $query;
        } else {
            $users = User::paginate(10);
        }
        $users = $query->get();

        return view('users.search', compact('users', 'search'));
    }
}
