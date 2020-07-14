<form method="POST" action="{{route('book.update',[$book])}}">
    Title: <input type="text" name="book_title" value="{{$book->title}}">
    ISBN: <input type="text" name="book_isbn" value="{{$book->isbn}}">
    Pages: <input type="text" name="book_pages" value="{{$book->pages}}">
    About: <textarea name="book_about">{{$book->about}}"</textarea>
    <select name="author_id">
        @foreach ($authors as $author)
            <option value="{{$author->id}}" @if($author->id == $book->author_id) selected @endif>
                {{$author->name}} {{$author->surname}}
            </option>
        @endforeach
</select>
    @csrf
    <button type="submit">EDIT</button>
</form>
