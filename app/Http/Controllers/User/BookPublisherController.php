<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Publisher;
use App\Models\Book;

class BookPublisherController extends Controller
{
     public function index($id)
    {
        $publisher = Publisher::find($id);
        $books = Book::with('rates', 'publisher')
            ->where('publisher_id', '=', $id)
            ->paginate(config('limitdata.category'));

        return view('user.book-publisher', compact('publisher', 'books'));
    }
}
