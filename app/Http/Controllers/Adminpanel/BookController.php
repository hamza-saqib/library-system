<?php

namespace App\Http\Controllers\Adminpanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Rack;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $books = Book::orderby('id', 'desc')->get();
        return view('adminpanel.pages.book_list', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $racks = Rack::all();

        return view('adminpanel.pages.book_create', compact('racks'));

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
            if(Book::create(['title'=>$request->title, 'publish_year'=>$request->publish_year,
            'author'=>$request->author, 'rack_id'=>$request->rack_id])){
                return redirect()->back()->with('success', 'Created Successfuly !');
            }
            else{
                return redirect()->back()->with('error', 'Error while Creating!');
            }
        }
        else{
            return redirect()->back()->with('error', 'Rack is Full, Rack Limit is 20');
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

        $racks = Rack::all();

        $book = Book::find($id);
        return view('adminpanel.pages.book_edit', compact('book', 'racks'));
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
            $book->title = $request->title;
            $book->publish_year = $request->publish_year;
            $book->author = $request->author;
            $book->rack_id = $request->rack_id;
            $book->save();
            return redirect()->back()->with('success', 'Update Successfuly !');
        }
        return redirect()->back()->with('error', 'Error while updating !');
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
            return response()->json(['success'=>'Deleted successfully !']);
        }
        return response()->json(['error'=>'Book not found !']);
    }
}
