@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1 class="display-3">Rack '{{$rack->name}}' Books</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Publish Year</th>
                <th scope="col">Author</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rack->books as $book)
                <tr>
                    <th scope="col">{{$loop->iteration}}</th>
                    <td>{{$book->title}}</td>
                    <td>{{$book->publish_year}}</td>
                    <td>{{$book->author}}</td>
                    <td><a href="#" class="btn btn-outline-primary">Open</a></td>
                </tr>
                <tr>
                @empty
                <p>No Racks Availabe</p>
                @endforelse
                
            </tbody>
        </table>
        
    </div>
</div>
@endsection
