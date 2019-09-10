@extends('user.layouts.master')
@section('title', trans('read_now'))
@section('content')
<div class="container top">
    <h5 class="text-center mb-4">{{ $book->title }}</h5>
    <div class="row ">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 content offset-1">
            {{ $book->book_content }}
        </div>
    </div>
</div>
@endsection
