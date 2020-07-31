@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Books</div>
               <form action="{{route('book.index')}}" method="get">
                <select name="author_id">
                    <option value="0">Show All</option>
                    @foreach ($authors as $author)
                        <option value="{{$author->id}}" @if($selectId == $author->id) selected @endif>{{$author->name}} {{$author->surname}}</option>
                    @endforeach
                </select><br><br>
                Sort By: <br>
                Title: <input type="radio" name="sort" value="title" @if('title' == $sort) checked @endif><br>
                Pages: <input type="radio" name="sort" value="pages" @if('pages' == $sort) checked @endif><br>
                <button type="submit">FILTER</button>
                </form>
               <div class="card-body">
                    @foreach ($books as $book)
                    <a href="{{route('book.edit',[$book])}}">{{$book->title}} {{$book->bookAuthor->name}} {{$book->bookAuthor->surname}}</a><br>
                    
                    <form method="POST" action="{{route('book.destroy', [$book])}}">
                    @csrf
                    <button type="submit">DELETE</button>
                    </form>
                    <br>
                  @endforeach
               </div>
           </div>
       </div>
   </div>
</div>
@endsection
