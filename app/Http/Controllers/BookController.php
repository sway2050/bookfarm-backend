<?php

namespace App\Http\Controllers;

use App\Services\Interfaces\BookServiceInterface;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function __construct(private BookServiceInterface $bookService)
    {

    }

    public function index(Request $request)
    {
        return response()->json(['data' => $this->bookService->list($request)]);
    }

    public function show($id)
    {
        return response()->json(['detail' => $this->bookService->find($id)]);
    }

    public function store(Request $request)
    {
        $this->bookService->create($request->only('title', 'author', 'description', 'genre', 'image', 'isbn', 'published_on', 'publisher'));
        return response()->json(['data' => []]);
    }

    public function edit($id, Request $request)
    {
        $book = $this->bookService->find($id);
        if (empty((array) $book)) {
            return response()->json(['error' => trans('book.error.not_found')], 422);
        }

        $this->bookService->update($id, $request->only('title', 'author', 'description', 'genre', 'image', 'isbn', 'published_on', 'publisher'));
        return response()->json(['data' => []]);
    }

    public function delete($id)
    {
        $this->bookService->delete($id);
        return response()->json(['data' => []]);
    }
}
