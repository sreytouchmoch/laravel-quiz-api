<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return Book::paginate(3);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title'=>'min:3|max:10',
            'body'=>'min"3|max:50',
        ]);
        $book = new Book();
        $book->author_id = $request->user_id;
        $book->title = $request->title;
        $book->body = $request->body;
        $book->save();
        return response()->json(['message'=> 'Book Created'],201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return Book::findorFail($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $request->validate([
            'title'=>'min:3|max:10',
            'body'=>'min"3|max:50',
        ]);
        $book = Book::findOrFail($id);
        $book->author_id = $request->user_id;
        $book->title = $request->title;
        $book->body = $request->body;
        $book->save();
        return response()->json(['message'=> 'Book Update'],200);
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return Book::destroy($id);
    }
}
