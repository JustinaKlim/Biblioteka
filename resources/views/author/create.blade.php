<form method="POST" action="{{route('author.store')}}">
    Name: <input type="text" name="author_name">
    Surname: <input type="text" name="author_surname">
    @csrf
    <button type="submit">ADD</button>
 </form>
 