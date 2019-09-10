@extends('user.layouts.master')
@section('title', trans('user-detail'))
@section('content')
<div class="container top user_detail">
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-1">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 avatar">
                        @if(!empty($user->avatar))
                            <img src="{{ $user->avatar }}" alt="">
                        @else
                            <img src="{{ config('constant.avatar_empty') }}" alt="">
                        @endif
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-8 mt-3">
                        <h5>{{ $user->name }}</h5>
                        <p>{{ $user->email }}</p>
                        <p><span class="number_follow">{{ $numberFollower }}</span> {{ trans('client.follower') }}</p>
                    </div>
                    @if($user->id != Auth::user()->id)
                        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 mt-4">
                            <a href="javascript:void(0)" class="{{ ($followed == 1) ? "btn btn-secondary" : "btn btn-danger" }} btn_follow" id="{{ $user->id }}"><i class="fa fa-flag mr-2"></i><span id="follow_flag">{{ ($followed == 1) ? trans('client.followed') : trans('client.follow') }}</span></a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
    <h5 class="mt-5">{{ trans('client.list_favorite_book') }} >></h5>
    @if($books->count()!= 0)
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
    @else
        <p>{{ trans('client.empty') }}</p>
    @endif
</div>

@endsection
