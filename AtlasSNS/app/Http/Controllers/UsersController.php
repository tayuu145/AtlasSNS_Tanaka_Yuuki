<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    //
    public function profile(){
        return view('users.profile');
    }
    public function search(Request $request){
        return view('users.search');
         $keyword = $request->input('keyword');
        $stock = $request->input('stock');

        $query = Book::query();

        if (!empty($keyword)) {
            $query->where('title', 'LIKE', "%{$keyword}%")
                ->orWhere('author', 'LIKE', "%{$keyword}%");
        }

        if (!empty($stock)) {
            $query->where('stock', '>=', $stock);
        }

        $books = $query->get();

        return view('book.index', compact('books', 'keyword', 'stock'));
    }
}
