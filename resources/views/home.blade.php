@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
    <h1 class="display-3">List of Racks</h1>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">Rack Name</th>
                <th scope="col">Total Books</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse($racks as $rack)
                <tr>
                <td>{{$rack->name}}</td>
                <td>{{count($rack->books)}}</td>
                <td><a href="{{ route('rack.show', $rack->id) }}" class="btn btn-outline-primary">Open</a></td>
                </tr>
                @empty
                <tr>
                <td>No Racks Found !</td>
                <tr>
                @endforelse
                
            </tbody>
        </table>
        
    </div>
    {{ $racks->links() }}
</div>
@endsection
