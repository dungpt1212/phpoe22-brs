<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Publisher;
use App\Models\Category;
use App\Http\Requests\BookRequest;
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
        $book = Book::all()->paginate(trans('admin.10records'));

        return view('admin.book.index', compact('book'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $publishers = Publisher::all();
        $categories = Category::all();

        return view('admin.book.create', compact('publishers'), compact('categories'));
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
        $book->title = $request->title;
        $book->book_content = $request->book_content;
        if ($request->file('image')){
            $file_upload = $request->file('image');
            $file_upload = $file_upload->move(public_path('images'), $file_upload->getClientOriginalName());
            $fileName = pathinfo($file_upload);
            $book->image = $fileName['basename'];
        }
        $book->price = $request->price;
        $book->number_page = $request->number_page;
        $book->publisher_id = $request->publisher_id;
        $book->category_id = $request->category_id;
        $book->save();

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

        return view('admin.book.edit', compact('data', 'categories', 'publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $book)
    {
        $data = Book::findOrFail($book);
        $data->title = $request->title;
        $data->book_content = $request->book_content;
        if ($request->file('image')) {
            $file_upload = $request->file('image');
            $file_upload = $file_upload->move(public_path('images'), $file_upload->getClientOriginalName());
            $fileName = pathinfo($file_upload);
            $data->image = $fileName['basename'];
        }
        $data->number_page = $request->number_page;
        $data->publisher_id = $request->publisher_id;
        $data->category_id = $request->category_id;
        $data->update();

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
