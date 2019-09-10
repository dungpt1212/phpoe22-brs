<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\Author\AuthorRepositoryInterface;
use App\Repositories\AuthorBook\AuthorBookRepositoryInterface;

class BookAuthorController extends Controller
{
    protected $bookRepo;
    protected $authorRepo;
    protected $authorBookRepo;

    public function __construct(
        BookRepositoryInterface $bookRepo,
        AuthorRepositoryInterface $authorRepo,
        AuthorBookRepositoryInterface $authorBookRepo
    )
    {
        $this->bookRepo = $bookRepo;
        $this->authorRepo = $authorRepo;
        $this->authorBookRepo = $authorBookRepo;
    }

    public function index($id)
    {
        $author = $this->authorRepo->find($id);
        if($author == false){
            return view('errors.notfound');
        }
        $bookAuthor = $this->authorBookRepo->getAuthorBook($id);
        $books = $this->bookRepo->getBookPanigateByAuthor($bookAuthor);

        return view('user.book-author', compact('books', 'author'));
    }
}
