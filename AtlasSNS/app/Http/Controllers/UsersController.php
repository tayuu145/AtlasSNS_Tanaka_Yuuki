<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\User;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(){
        return view('users.search');

    }

    public function searching(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)) {
            $_keyword = str_replace('　', ' ', $keyword);
            $_keyword = preg_replace('/\s(?=\s)/', '', $keyword);
            $_keyword = trim($keyword);

            $query = User::query();

            $query->where('username', 'LIKE', '%'.$keyword.'%');
            $users = $query;

        }else {
            $users = User::paginate(10);
        }
            $users = $query->get();

        return view('users.search', compact('users','keyword'));
    }
}
