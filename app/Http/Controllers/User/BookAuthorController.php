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
        $author = Author::find($id);
        $bookAuthor = AuthorBook::where('author_id', '=', $id)->pluck('book_id');
        $books = Book::with('rates', 'publisher')
            ->whereIn('id', $bookAuthor)
            ->paginate(8);

        return view('user.book-author', compact('books', 'author'));
    }
}
