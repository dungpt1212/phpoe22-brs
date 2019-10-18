@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<h3 class="text-center">{{ trans('admin.your_notice') }} ({{ Auth::user()->notifications->count() }})</h3>
<div class="container-fluid">
    <div class="list-group">
        @foreach (Auth::user()->notifications as $notice)
            <a class="app-notification__item {{ ($notice->read_at == null) ? 'bg bg-primary' : ''}}"
                href="{{ route('notification.detail',
                    [
                    'idRequire' => getDataFromAdminNotification($notice)['idRequire'],
                    'idNotice' => $notice->id,
                    ]) }}">
                <span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                <div>
                    <p class="app-notification__message">
                        <b>{{ getDataFromAdminNotification($notice)['user'] }}</b>
                        {{ trans('admin.sent_request_add_new_book') }}
                        <b><i>'{{ getDataFromAdminNotification($notice)['nameBook'] }}'</i></b>
                    </p>
                    <p class="app-notification__meta">{{ $notice->created_at }}</p>
                </div>
            </a>
        @endforeach
    </div>
</div>
@endsection
