<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\BookRequest;
use App\Models\Book;
use Validator;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = BookResource::collection(Book::all());
        return response()->json([
        "status_code"=> 200,
        "status" => "success",
        "data" => $books
        ], 200);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BookRequest $request)
    {

        $book = Book::create($request->all());
        return response()->json([
        "status_code"=> 201,
        "status" => "success",
        "data" => new BookResource($book)
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {

        if (is_null($book)) {
            return $this->response()->json([
                "status" => "failure",
                "status_code"=> 404,
                "message" =>"Book not found."
            ], 404);
        }
        return response()->json([
        "status_code"=> 200,
        "status" => "success",
        "data" => new BookResource($book)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $book->update($request->all());
        $name = $book->name;
        return response()->json([
        "status_code"=> 200,
        "status" => "success",
        "message" => "The book, $name was updated successfully.",
        "data" => new BookResource($book)
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $name = $book->name;
        $book->delete();
        return response()->json([
        "status" => "success",
        "status_code"=> 204,
        "message" => "The book, $name was deleted successfully.",
        "data" => []
        ]);
    }
}
