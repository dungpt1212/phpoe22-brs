<?php
namespace App\Repositories\Book;

interface BookRepositoryInterface
{
    public function getBookOrderById();

    public function getBookOrderByView();

    public function getBookPanigateByCategory($categoryId);

    public function getBookPanigateByAuthor($bookAuthor);

    public function searchBookByTitle($keyword);

    public function getFavoriteBook($attr = []);

}
