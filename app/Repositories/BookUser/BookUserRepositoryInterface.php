<?php
namespace App\Repositories\BookUser;

interface BookUserRepositoryInterface
{
    public function getFavoriteBookByUser($authId);
    public function getReadingBookByUser($authId);
}
