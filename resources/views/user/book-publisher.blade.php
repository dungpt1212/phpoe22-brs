@extends('user.layouts.master')
@section('title', trans('client.category'))
@section('content')
<div class="container top">
    <h3 class="text-center mb-4">{{ $publisher->publisher_name }} ({{ $publisher->books->count() }})</h3>
    <div class="row">
        @foreach($books as $book)
            <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 mt-5 detail">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                            <img src="{{ $book->image }}">
                            <p>{{ $book->view }} {{ trans('client.views') }}</p>
                            <p>
                                <span>
                                    <a class="compare text-dark" href="{{ route('book-read', ['id' => $book->id]) }}" title="{{ trans('client.read_now') }}"><i class="bi bi-book " ></i></a>
                                </span>
                                <span class="ml-3">
                                    <a href="{{ route('book-detail', ['id' => $book->id]) }}" title="{{ trans('client.detail') }}" class="compare" href="#productmodal"><i class="bi bi-search text-dark"></i>
                                    </a>
                                </span>
                                <span class="ml-3">
                                    <a class="compare" href="#"><i class="bi bi-heart-beat text-dark" title="{{ trans('client.favorite') }}"></i>
                                    </a>
                                </span>
                            </p>
                        </div>
                        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 right">
                            <a href="{{ route('book-detail', ['id' => $book->id]) }}"><h5>{{ $book->title }}</h5></a>
                            <p>{{ $book->publisher->publisher_name }}</p>
                            <p>
                                @php
                                   $avgRate = avgRate($book->rates)
                                @endphp
                                @if($avgRate != 0)
                                    @for($i = 1; $i <= $avgRate;  $i++)
                                        <span class="on"><i class="fa fa-star-o text-warning"></i></span>
                                    @endfor
                                    @for($i = 1; $i <= 5-$avgRate;  $i++)
                                        <span class="on"><i class="fa fa-star-o"></i></span>
                                    @endfor
                                @else
                                    {{ trans('client.no_rate') }}
                                @endif
                            </p>
                            <p> {{ $book->rates->count() }} {{ trans('client.votes') }}<span class="compare ml-2" href="#"><i class="bi bi-heart-beat text-danger" title="{{ trans('client.favorite') }}"></i></a></span></p>
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="row mt-5">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            {{ $books->links() }}
        </div>
    </div>
</div>

@endsection
