@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1 class="display-3">Search Books</h1>
    <form class="row g-3" action="{{route('book.search')}}" method="POST">
        @csrf
        <div class="col-auto">
            <input type="text" name="title" class="form-control" @isset($title) value="{{$title}}" @endisset  placeholder="Title">
        </div>
        <div class="col-auto">
            <input type="text" name="author" class="form-control" @isset($author) value="{{$author}}" @endisset  placeholder="Author">
        </div>
        <div class="col-auto">
            <input type="number" name="publish_year" class="form-control"  @isset($publish_year) value="{{$publish_year}}" @endisset  placeholder="Publish Year">
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary mb-3">Search</button>
        </div>
    </form>

        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Publish Year</th>
                <th scope="col">Author</th>
                <th scope="col">Rack Name</th>
                </tr>
            </thead>
            <tbody>
                @forelse($books as $book)
                <tr>
                    <th scope="col">{{$loop->iteration}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$book->publish_year}}</td>
                    <td>{{$book->author}}</td>
                    <td>{{$book->rack->name}}</td>
                </tr>
                
                @empty
                <tr>
                    <td scope="col">No Books Found !</td>
                    
                </tr>
                
                @endforelse
                
            </tbody>
        </table>
        
    </div>
    {{ $books->links() }}
</div>
@endsection
