<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepositoryInterface;

class SearchController extends Controller
{
    protected $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function index(Request $request)
    {
        $keyword = $request->keyword;
        $books = $this->bookRepo->searchBookByTitle($keyword);

        return view('user.result-search', compact('books', 'keyword'));
    }
}
