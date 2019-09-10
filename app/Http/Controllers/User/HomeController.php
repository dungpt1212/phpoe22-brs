<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepositoryInterface;

class HomeController extends Controller
{
    protected $bookRepo;

    public function __construct(BookRepositoryInterface $bookRepo)
    {
        $this->bookRepo = $bookRepo;
    }

    public function index()
    {
        $newUpdatedBooks = $this->bookRepo->getBookOrderById();

        $highestViewedBooks = $this->bookRepo->getBookOrderByView();

        return view('user.home', compact('newUpdatedBooks', 'highestViewedBooks'));
    }

}
