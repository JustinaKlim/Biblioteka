@extends('layouts.app')

@section('content')
<div class="container">
   <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-header">Create the book</div>
               <div class="card-body">
                    <form method="POST" action="{{route('book.store')}}">
                        Title: <input type="text" name="book_title">
                        ISBN: <input type="text" name="book_isbn">
                        Pages: <input type="text" name="book_pages">
                        About: <textarea name="book_about" id="summernote"></textarea>
                        <select name="author_id">
                            @foreach ($authors as $author)
                                <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
                            @endforeach
                        </select>
                        @csrf
                        <button type="submit">ADD</button>
                    </form>
               </div>
           </div>
       </div>
   </div>
</div>
<script>
    $(document).ready(function() {
       $('#summernote').summernote();
     });
    </script>    
@endsection
