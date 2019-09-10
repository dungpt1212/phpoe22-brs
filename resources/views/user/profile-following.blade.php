@extends('user.layouts.master')
@section('title', trans('client.category'))
@section('content')
<div class="container top following">
    <h3 class="text-center mb-4">{{ trans('client.your_following_list') }}</h3>
    <ul class="list-group">
    @if($followings->count() != 0)
        <ul class="list-group">
            @foreach($followings as $following)
                <li class="list-group-item">
                    @if(!empty($following->user->avatar))
                        <img src="{{ $following->user->avatar }}" alt="">
                    @else
                        <img src="{{ config('constant.avatar_empty') }}" alt="">
                    @endif
                    <a href="{{ route('show-detail-user', $following->user->id) }}"><span class="ml-3">{{ $following->user->name }}</span></a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center">{{ trans('client.empty') }}</p>
    @endif
    </ul>
</div>

@endsection
