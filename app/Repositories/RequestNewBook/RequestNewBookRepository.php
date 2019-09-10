<?php
namespace App\Repositories\RequestNewBook;

use App\Repositories\BaseRepository;
use App\Repositories\RequestNewBook\RequestNewBookRepositoryInterface;

class RequestNewBookRepository extends BaseRepository implements RequestNewBookRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\RequestNewbook::class;
    }


    public function getRequireBook($authId)
    {
        return $this->model->where('user_id', $authId)->get();
    }

}
