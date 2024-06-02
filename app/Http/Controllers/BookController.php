<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="Book API", version="1.0")
 */
class BookController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/books",
     *     @OA\Response(
     *         response=200,
     *         description="Display a listing of books",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(ref="#/components/schemas/Book")
     *         )
     *     )
     * )
     */
    public function index(Request $request)
    {
        $books = Book::all();
        if ($request->wantsJson()) {
            return response()->json($books);
        } else {
            return view('welcome', compact('books'));
        }
    }

    /**
     * @OA\Post(
     *     path="/api/books",
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     ),
     *     @OA\Response(
     *         response=201,
     *         description="Store a newly created book in storage",
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     )
     * )
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        $book = Book::create($request->all());
        
        if ($request->wantsJson()) {
            return response()->json($book, 201);
        } else {
            return redirect('/')->with('success', 'Book added successfully.');
        }
    }

    /**
     * @OA\Get(
     *     path="/api/books/{id}",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="ID of the book to retrieve"
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Display the specified book",
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     )
     * )
     */
    public function show($id, Request $request)
    {
        $book = Book::find($id);
        return response()->json($book);
    }

    /**
     * @OA\Put(
     *     path="/api/books/{id}",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="ID of the book to update"
     *     ),
     *     @OA\RequestBody(
     *         required=true,
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Update the specified book in storage",
     *         @OA\JsonContent(ref="#/components/schemas/Book")
     *     )
     * )
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'author' => 'required',
            'description' => 'required',
        ]);

        $book = Book::findOrFail($id);
        $book->update($request->all());

        if ($request->wantsJson()) {
            return response()->json($book, 200);
        } else {
            return redirect('/')->with('success', 'Book updated successfully.');
        }
    }

    /**
     * @OA\Delete(
     *     path="/api/books/{id}",
     *     @OA\Parameter(
     *         name="id",
     *         in="path",
     *         required=true,
     *         @OA\Schema(type="integer"),
     *         description="ID of the book to delete"
     *     ),
     *     @OA\Response(
     *         response=204,
     *         description="Remove the specified book from storage"
     *     )
     * )
     */
    public function destroy($id, Request $request)
    {
        Book::findOrFail($id)->delete();

        if ($request->wantsJson()) {
            return response()->json(null, 204);
        } else {
            return redirect('/')->with('success', 'Book deleted successfully.');
        }
    }
}
