<?php
namespace App\Repositories\AuthorBook;

use App\Repositories\BaseRepository;
use App\Repositories\AuthorBook\AuthorBookRepositoryInterface;

class AuthorBookRepository extends BaseRepository implements AuthorBookRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\AuthorBook::class;
    }

    public function getAuthorBook($id)
    {
        return $this->model->where('author_id', '=', $id)->pluck('book_id');
    }



}
