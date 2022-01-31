<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;

class BookController extends Controller
{
     /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['validateClient']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::paginate(10);
        return view('book_list', compact('books'));
    }

    public function search(Request $request)
    {
        //return $request;
        if($request->filled('title')){
            $title = $request->title;
        }
        else{
            $title = false;
        }
        if($request->filled('author')){
            $author = $request->author;
        }
        else{
            $author = false;
        }
        if($request->filled('publish_year')){
            $publish_year = $request->publish_year;
        }
        else{
            $publish_year = false;
        }

        $books = Book::when($title, function ($query, $title) {
            return $query->where('title', 'like', '%'.$title.'%');
        })
        ->when($author, function ($query, $author) {
            return $query->where('author', 'like', '%'.$author.'%');
        })
        ->when($publish_year, function ($query, $publish_year) {
            return $query->where('publish_year', $publish_year);
        })
        ->paginate(10);

        return view('book_list', compact('books', 'title', 'author', 'publish_year'));
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
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    }
}
