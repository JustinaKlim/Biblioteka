<form method="POST" action="{{route('author.update',[$author])}}">
    Name: <input type="text" name="author_name" value="{{$author->name}}">
    Surname: <input type="text" name="author_surname" value="{{$author->surname}}">
    @csrf
    <button type="submit">EDIT</button>
 </form>
 