<?php

namespace App\Services;

use App\Models\Book;
use App\Services\Interfaces\BookServiceInterface;

class BookService implements BookServiceInterface
{

    public function list($query)
    {
        $offset = ($query->page - 1) * $query->rowsPerPage;
        $limit = $query->rowsPerPage;
        $books = Book::orderBy($query->sortBy, $query->sortType);
        $searchfilterColumns = ['title', 'author', 'isbn', 'date', 'published_on', 'genre'];

        foreach ($searchfilterColumns as $filterColumn) {
            if (!empty($query->search[$filterColumn])) {
                $books->where($filterColumn, 'LIKE', '%' . $query->search[$filterColumn] . '%');
            }
        }
        $count = $books->count();
        $books = $books->offset($offset)->limit($limit)->get();
        $data = ['records' => $books, 'recordsTotal' => $count];
        return $data;
    }

    public function find($id)
    {
        return Book::find($id);
    }

    public function create($data)
    {
        Book::create($data);
    }

    public function update($id, $data)
    {
        Book::whereId($id)->update($data);
    }

    public function delete($id)
    {
        Book::whereId($id)->delete();
    }
}
