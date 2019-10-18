<h3>Hello</b></h3>
<p>
    You received a new request add new book
    <b><i>{{ $requireBook->book_name }}</i></b>
    from '
    <b>{{ $sender->name }}</b>'
</p>
<a href="{{ route('editbook.index') }}">View Detail</a>
