<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Repositories\Author\AuthorRepositoryInterface;
use App\Repositories\Book\BookRepositoryInterface;
use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Publisher\PublisherRepositoryInterface;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $bookRepo;
    protected $authorRepo;
    protected $cateRepo;
    protected $pubRepo;

    public function __construct(
            BookRepositoryInterface $bookRepo,
            AuthorRepositoryInterface $authorRepo,
            CategoryRepositoryInterface $cateRepo,
            PublisherRepositoryInterface $pubRepo

        )
    {
        $this->bookRepo = $bookRepo;
        $this->authorRepo = $authorRepo;
        $this->cateRepo = $cateRepo;
        $this->pubRepo = $pubRepo;
        $this->middleware('auth');
        $this->middleware('permission:book-view-list', ['only' => ['index']]);
        $this->middleware('permission:book-create',   ['only' => ['create', 'store']]);
        $this->middleware('permission:book-update',   ['only' => ['edit', 'update', 'show']]);
        $this->middleware('permission:book-delete',   ['only' => ['destroy']]);
    }

    public function index()
    {
        $book = $this->bookRepo->getAll();

        return view('admin.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = $this->authorRepo->getAll();
        $publishers = $this->pubRepo->getAll();
        $categories = $this->cateRepo->getAll();
        $result = compact('publishers', 'categories', 'authors');

        return view('admin.book.create', $result);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {
        $data = $request->all();
        $response = getDataFromRequest($data);
        $book = $this->bookRepo->create($response);

        foreach ($request->get('author') as $key) {
            $book->authors()->attach($key);
        }

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        $data = $this->bookRepo->find($book);
        if($data == false){
            return view('errors.notfound');
        }

        return view('admin.book.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($book)
    {
        $data = $this->bookRepo->find($book);
        if($data == false){
            return view('errors.notfound');
        }
        $publishers = $this->pubRepo->getAll();
        $categories = $this->cateRepo->getAll();
        $book_publisher = $this->bookRepo->findPublisherByBook($book);
        $book_category = $this->bookRepo->findCategoryByBook($book);
        $authors = $this->authorRepo->getAll();
        $book_authors = $this->bookRepo->findAuthorByBook($book);
        $result = compact('data', 'categories', 'publishers', 'book_publisher', 'book_category', 'book_authors', 'authors');

        return view('admin.book.edit', $result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBookRequest $request, $id)
    {
        $book = $this->bookRepo->find($id);
        if($book == false){
            return view('errors.notfound');
        }
        $book->authors()->detach();
        $data = $request->all();
        $response = getDataFromRequest($data);
        $updated = $this->bookRepo->update($id, $response);
        foreach ($request->get('author') as $key) {
            $book->authors()->attach($key);
        }

        return redirect()->route('book.index')->with('status', trans('admin.update_success'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($book)
    {
        $data = $this->bookRepo->find($book);
        if($data == false){
            return view('errors.notfound');
        }
        $this->bookRepo->delete($book);

        return redirect()->route('book.index')->with('status', trans('admin.delete_success'));
    }
}
