@extends('user.layouts.master')
@section('title', trans('client.category'))
@section('content')
<div class="container top following">
    <h3 class="text-center mb-4">{{ trans('client.your_follower_list') }}</h3>
    @if($followers->count() != 0)
        <ul class="list-group">
            @foreach($followers as $follower)
                 <li class="list-group-item">
                    @if(!empty($follower->avatar))
                        <img src="{{ $follower->avatar }}" alt="">
                    @else
                        <img src="{{ config('constant.avatar_empty') }}" alt="">
                    @endif
                    <a href="{{ route('show-detail-user', $follower->id) }}"><span class="ml-3">{{ $follower->name }}</span></a>
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-center">{{ trans('client.empty') }}</p>
    @endif
</div>

@endsection
