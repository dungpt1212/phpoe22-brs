@extends('user.layouts.master')
@section('title', trans('client.history_activity'))
@section('content')
<div class="container top">
    <h3 class="text-center mb-4">{{ trans('client.history_activities') }}</h3>
    <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 offset-1">
            <div class="list-group">
                @foreach($userActivities as $userActivity)
                    @if($userActivity->activity->type == 1)
                        <a href="{{ route('show-detail-user', $userActivity->type_id) }}" class="list-group-item list-group-item-action">
                            {{ $userActivity->activity->activity_name }} {{ trans('user') }} "<span class="text-primary">{{ checkActivityRelatedTable($userActivity)->name }}</span>"
                            <p class="bi bi-alarm-clock">
                                <span class="ml-2">{{ $userActivity->created_at }}</span>
                            </p>
                        </a>
                    @else
                        <a href="{{ route('book-detail', $userActivity->type_id) }}" class="list-group-item list-group-item-action">
                            {{ $userActivity->activity->activity_name }} {{ trans('at book') }} "<span class="text-primary">{{ checkActivityRelatedTable($userActivity)->title }}</span>"
                            <p class="bi bi-alarm-clock">
                                <span class="ml-2">{{ $userActivity->created_at }}</span>
                            </p>
                        </a>
                    @endif
                @endforeach
            </div>
         </div>
    </div>
</div>
@endsection
