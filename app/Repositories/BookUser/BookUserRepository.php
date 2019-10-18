<?php
namespace App\Repositories\BookUser;

use App\Repositories\BaseRepository;
use App\Repositories\BookUser\BookUserRepositoryInterface;

class BookUserRepository extends BaseRepository implements BookUserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\BookUser::class;
    }

    public function getFavoriteBookByUser($authId)
    {
        return $this->model
            ->where([
                [ 'favorite', '=', 1 ],
                [ 'user_id', '=', $authId ],
            ])
            ->pluck('book_id');
    }

    public function getReadingBookByUser($authId)
    {
        return $this->model
            ->where([
                [ 'reading', '=', 1 ],
                [ 'user_id', '=', $authId ],
            ])
            ->pluck('book_id');
    }

}
