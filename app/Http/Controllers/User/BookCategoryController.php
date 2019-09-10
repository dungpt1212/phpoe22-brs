<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Book;
class BookCategoryController extends Controller
{
    public function index($id)
    {
        $category = Category::findOrFail($id);
        $books = Book::with('rates', 'publisher')
            ->where('category_id', $id)
            ->paginate(config('limitdata.category'));

        return view('user.book-category', compact('category', 'books'));
    }
}
