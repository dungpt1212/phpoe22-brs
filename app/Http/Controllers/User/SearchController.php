<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $books = Book::search($keyword)->paginate(config('limitdata.category'));

        return view('user.result-search', compact('books', 'keyword'));
    }
}
