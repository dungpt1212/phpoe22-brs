<h3>Hello <b>{{ $user->name }}</b></h3>
<p>
    Your request add new book
    '<b><i>{{ $require->book_name }}'</i></b>
    is successful
</p>
<p>It will be handled soon by admin</p>
<a href="{{ route('require.index') }}">View Detail</a>
