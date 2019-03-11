<!-- index.blade.php -->

@extends('layout')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="uper">
  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br />
  @endif
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Piece Name</td>
          <td>Composer</td>
          <td>ISBN Number</td>
          <td>Publisher</td>
          <td>Piece Price</td>
          <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($books as $book)
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->book_name}}</td>
            <td>{{$book->composer}}</td>
            <td>{{$book->isbn_no}}</td>
            <td>{{$book->publisher}}</td>
            <td>{{$book->book_price}}</td>

            <td><a href="{{ route('books.edit',$book->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{ route('books.destroy', $book->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
        
    </tbody>
  </table>
  <a href="{{route('books.create')}}" class="btn btn-success">Create</a>
<div>
@endsection
