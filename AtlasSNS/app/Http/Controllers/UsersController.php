<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //
    public function profile()
    {

        return view('users.profile');
    }
    // protected function validator(array $data)
    // {
    //     // ↓(検証する配列値(名前),検証ルール)
    //     return Validator::make($data, [
    //         'username' => 'required|string|max:255',
    //         'mail' => 'required|string|email|max:255|unique:users',
    //         'password' => 'required|string|between:1,10|alpha_num',
    //         'password-confirm' => 'required|'
    //     ]);
    //     return $validator;
    // }
    public function profiledit(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'password' => 'required|string|between:1,10|alpha_num',
            'password-comfirm' => 'required|'
        ]);

        if ($validator->fails()) {
            return redirect('/profile')
                ->withInput()
                ->withErrors($validator);
        }
        $id = $request->input('id');
        $username = $request->input('name');
        $mail = $request->input('mail');
        $password = $request->input('password');
        $bio = $request->input('bio');
        $icon = $request->file('icon');

        $dir = 'images';
        $request->file('icon')->store('public/' . $dir);

        // $update = [
        //     'username' => $username,
        //     'mail' => $mail,
        //     'password' => $password,
        //     'bio' => $bio,
        //     'images' => $icon,
        // ];

        // 2つ目の処理　　引数左カラムに右変数に更新(↓uodateによって)
        User::where('id', $id)->update([
            'username' => $username,
            'mail' => $mail,
            //            暗号化したままDBに保存
            'password' => bcrypt($password),
            'bio' => $bio,
            'images' => $icon,
        ]);
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

    public function userprofile()
    {
        return view('users.userprofile');
    }
}
