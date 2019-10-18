<h3>Hello!</h3>
@if($books->count() != 0)
    <h4>you are reading {{ $books->count() }} books</h4>
    <ul>
        @foreach ($books as $book)
            <li>{{ $book->title }}</li>
        @endforeach
    </ul>
@else
    <h4>Visit our website to read more favorite books {{ route('homepage') }}</h4>
@endif
