<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $books = Book::all();
        if(!empty($books)){
            return Response()->json(['data' => $books], 200);
        }
        else{
           return Response()->json(['message' => 'No books found'], 404);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $data = array();
        $data['book_title'] = $request->book_title;
        $data['author_id'] = $request->author_id;
        $data['book_publish_year'] = $request->book_publish_year;
        $data['book_isbn'] = $request->book_isbn;
        $data['book_price'] = $request->book_price;
        $data['created_at'] = Carbon::now();
        $data['updated_at'] = Carbon::now();

        $rules = array(
            'book_title' => 'required',
            'author_id' => 'required',
            'book_publish_year' => 'required|integer',
            'book_isbn' => 'required',
            'book_price' => 'required|numeric'
        );

        $validator = Validator::make($request->all(), $rules);

        // Check if validation fails
        if ($validator->fails()) {
            return Response()->json(['errors' => $validator->errors()], 422);
        }
        else{
             $book = Book::create($data);
        if($book){
            return Response()->json(['Message' => 'New Book has been created'], 200);
        }
        else{
           return Response()->json(['message' => 'Not Successful'], 404);
        }
        }  
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        $book = Book::find($book->id);
        if(!empty($book)){
            return Response()->json(['data' => $book], 200);
        }
        else{
           return Response()->json(['message' => 'No books found'], 404);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
         $bok = Book::find($book->id);
        $bok->update($request->all());
        if($bok){
            return Response()->json(['Message' => 'Book data has been updated'], 200);
        }
        else{
           return Response()->json(['message' => 'Not Successful'], 404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
         $bok = Book::where('id', $book->id)->delete();
        if($bok){
            return Response()->json(['Message' => 'Book data has been deleted'], 200);
        }
        else{
           return Response()->json(['message' => 'Not Successful'], 404);
        }
    }


    public function search($look){

         $books = Book::where('book_title', 'LIKE', '%' . $look . '%')
            ->orWhere('book_isbn', 'LIKE', '%' . $look . '%')
            ->orWhere('book_publish_year', 'LIKE', '%' . $look . '%')
            ->get();
        if(!empty($books)){
            return Response()->json(['data' => $books], 200);

        }
        else{
           return Response()->json(['message' => 'No books found'], 404);
        }

    }


}
