<?php
namespace App\Repositories\Book;

use App\Repositories\BaseRepository;
use App\Repositories\Book\BookRepositoryInterface;

class BookRepository extends BaseRepository implements BookRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\Book::class;
    }

    public function findPublisherByBook($book)
    {
        return $this->model->find($book)->publisher->id;
    }

    public function findCategoryByBook($book)
    {
        return $this->model->find($book)->publisher->id;
    }

    public function findAuthorByBook($book)
    {
        return $this->model->find($book)->authors->pluck('id')->toArray();
    }

    public function getBookOrderById()
    {
        return $this->model
            ->with('publisher', 'rates')
            ->orderBy('id', 'DESC')
            ->take(config('limitdata.new_updated_books'))
            ->get();
    }

    public function getBookOrderByView()
    {
        return $this->model
            ->with('publisher', 'rates')->orderBy('view', 'DESC')
            ->take(config('limitdata.highest_viewed_books'))
            ->get();
    }

    public function getBookPanigateByCategory($categoryId)
    {
        return $this->model
            ->with('rates', 'publisher')
            ->where('category_id', $categoryId)
            ->paginate(config('limitdata.category'));

    }

    public function getBookPanigateByAuthor($bookAuthor)
    {
        return $this->model
            ->with('rates', 'publisher')
            ->whereIn('id', $bookAuthor)
            ->paginate(config('limitdata.category'));
    }

    public function searchBookByTitle($keyword)
    {
        return $this->model
            ->search($keyword)
            ->paginate(config('limitdata.category'));
    }

    public function getFavoriteBook($attr = [])
    {
        return $this->model->whereIn('id', $attr)->get();
    }

    public function getReadingBook($attr = [])
    {
        return $this->model->whereIn('id', $attr)->get();
    }

}
