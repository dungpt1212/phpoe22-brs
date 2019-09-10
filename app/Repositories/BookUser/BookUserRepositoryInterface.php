<?php
namespace App\Repositories\BookUser;

interface BookUserRepositoryInterface
{
    public function getFavoriteBookByUser($authId);
}
