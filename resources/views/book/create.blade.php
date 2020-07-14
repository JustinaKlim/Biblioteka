<form method="POST" action="{{route('book.store')}}">
    Title: <input type="text" name="book_title">
    ISBN: <input type="text" name="book_isbn">
    Pages: <input type="text" name="book_pages">
    About: <textarea name="book_about"></textarea>
    <select name="author_id">
        @foreach ($authors as $author)
            <option value="{{$author->id}}">{{$author->name}} {{$author->surname}}</option>
        @endforeach
 </select>
    @csrf
    <button type="submit">ADD</button>
 </form>
 