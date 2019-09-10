<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;
use App\Models\Author;
use App\Models\AuthorBook;
use App\Http\Requests\BookRequest;
use App\Http\Requests\UpdateBookRequest;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = new Book();
        $book = Book::all();

        return view('admin.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $publishers = Publisher::all();
        $categories = Category::all();
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
        $book = new Book();
        $data = $request->all();
        $response = getDataFromRequest($data, $book);
        $response = Book::create($book->getAttributes());
        $authors = $request->get('author');
        foreach ($authors as $key) {
            AuthorBook::firstOrCreate([
                'book_id' => $response->id,
                'author_id' => $key,
            ]);
        }

        return redirect()->route('book.create')->with('status', trans('admin.add_success'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($book)
    {
        $data = Book::findOrFail($book);

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
        $data = Book::findOrFail($book);
        $publishers = Publisher::all();
        $categories = Category::all();
        $book_publisher = $data->publisher->id;
        $book_category = $data->category->id;
        $authors = Author::all();
        $book_authors = $data->authors->pluck('id')->toArray();
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
        $book = Book::findOrFail($id);
        $data = $request->all();
        $response = getDataFromRequest($data, $book);
        $updated = $book->update($response->getAttributes());
        $book->authors()->detach();
        $authors = $request->get('author');
        foreach ($authors as $key) {
            AuthorBook::firstOrCreate([
                'book_id' => $response->id,
                'author_id' => $key,
            ]);
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
        $data = Book::findOrFail($book);
        $data->delete();

        return redirect()->route('book.index')->with('status', trans('admin.delete_success'));
    }
}
