<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Author;
use App\Models\Book;
use App\Models\AuthorBook;

class BookAuthorController extends Controller
{
    public function index($id)
    {
        $author = Author::findOrFail($id);
        $bookAuthor = AuthorBook::where('author_id', '=', $id)->pluck('book_id');
        $books = Book::with('rates', 'publisher')
            ->whereIn('id', $bookAuthor)
            ->paginate(config('limitdata.category'));

        return view('user.book-author', compact('books', 'author'));
    }
}
