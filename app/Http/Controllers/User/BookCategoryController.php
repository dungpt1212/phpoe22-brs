<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;

class BookCategoryController extends Controller
{
    protected $bookRepo;
    protected $categoryRepo;

    public function __construct(BookRepositoryInterface $bookRepo, CategoryRepositoryInterface $categoryRepo)
    {
        $this->bookRepo = $bookRepo;
        $this->categoryRepo = $categoryRepo;
    }

    public function index($id)
    {

        $category = $this->categoryRepo->find($id);
        if($category == false){
            return view('errors.notfound');
        }
        $books = $this->bookRepo->getBookPanigateByCategory($id);

        return view('user.book-category', compact('category', 'books'));
    }
}
