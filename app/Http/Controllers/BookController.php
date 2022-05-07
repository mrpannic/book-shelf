<?php

namespace App\Http\Controllers;

use App\Http\Resources\BookCollection;
use App\Http\Resources\BookResource;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::paginate(20);
        return response()->json(new BookCollection($books), 200);
    }

    public function show(Request $request, $id)
    {
        $book = Book::find($id);
        if(!$book)
            return response()->json(['message' => 'Not found'], 404);
        
        return response()->json(new BookResource($book), 200);
    }
}
