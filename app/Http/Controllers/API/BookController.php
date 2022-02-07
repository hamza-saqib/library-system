<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\Book;
use App\Models\Rack;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return BookResource::collection(Book::paginate(25));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'publish_year' => 'required|size:4',
            'author' => 'required|max:25',
            'rack_id' => 'required|exists:App\Models\Rack,id',
        ]);

        $total_book_added =  Book::where('rack_id', $request->rack_id)->count('id');
        if($total_book_added <= 10){
            $book = Book::create([
                'title' => $request->title,
                'author' => $request->author,
                'publish_year' => $request->publish_year,
                'rack_id' => $request->rack_id,
            ]);

            return new BookResource($book);
        }
        else{
            return response()->json('error', 'Rack is Full, Rack Limit is 10');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);
        if($book){
            return new BookResource($book);
        }
        return response()->json('error','resource not found.');

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
        $request->validate([
            'title' => 'required|max:255',
            'publish_year' => 'required|size:4',
            'author' => 'required|max:25',
            'rack_id' => 'required|exists:App\Models\Rack,id',
        ]);

        $book = Book::find($id);
        if($book){
            $book->update($request->only(['title', 'author', 'publish_year', 'rack_id']));
            return new BookResource($book);
        }

        return response()->json('error','resource not found.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);
        if($book){
            $book->delete();
            return response()->json('success','resource deleted successfully.');
        }
        return response()->json('error','resource not found.');
    }
}
