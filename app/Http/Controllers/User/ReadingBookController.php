<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Jobs\ScheduleNoticeForUserJob;
use App\Repositories\BookUser\BookUserRepositoryInterface;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\User\UserRepositoryInterface;
use Auth;
use App\Models\Book;
use App\Models\User;

class ReadingBookController extends Controller
{
    protected $bookRepo;
    protected $bookUserRepo;

    public function __construct
    (
        BookRepositoryInterface $bookRepo,
        BookUserRepositoryInterface $bookUserRepo,
        UserRepositoryInterface $userRepo
    ) {
        $this->bookRepo = $bookRepo;
        $this->bookUserRepo = $bookUserRepo;
        $this->userRepo = $userRepo;
        $this->middleware('auth');
    }

    public function index()
    {
        $booksReadingByUser = $this->bookUserRepo->getReadingBookByUser($this->userRepo->getAuthId());
        $books = $this->bookRepo->getReadingBook($booksReadingByUser);

        return view('user.book-reading', compact('books'));
    }
}
