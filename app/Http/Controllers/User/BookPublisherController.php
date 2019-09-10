<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\Publisher\PublisherRepositoryInterface;

class BookPublisherController extends Controller
{
    protected $bookRepo;
    protected $publisherRepo;

    public function __construct(BookRepositoryInterface $bookRepo, PublisherRepositoryInterface $publisherRepo)
    {
        $this->bookRepo = $bookRepo;
        $this->publisherRepo = $publisherRepo;
    }

     public function index($id)
    {
        $publisher = $this->publisherRepo->find($id);
        if($publisher == false){
            return view('errors.notfound');
        }
        $books = $this->bookRepo->getBookPanigateByCategory($id);

        return view('user.book-publisher', compact('publisher', 'books'));
    }
}
