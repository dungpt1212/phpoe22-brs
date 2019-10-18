@extends('user.layouts.master')
@section('title', trans('client.history_activity'))
@section('content')
<div class="container top">
    <div class="row">
        <div class="col-xs- col-sm- col-md- col-lg-12">
            <h3 class="text-center mb-4">{{ trans('client.all_notice') }}</h3>
            <div class="list-group">
                @foreach (Auth::user()->notifications as $notice)
                <a href="{{ route('user-notification.detail',
                        [
                        'idRequire' => getDataFromAdminNotification($notice)['idRequire'],
                        'idNotice' => $notice->id,
                        ]) }}"
                    class="list-group-item list-group-item-action {{ ($notice->read_at == null) ? 'read_notice' : ''}}">
                    <span class="fa-stack fa-lg">
                        <i class="fa fa-circle fa-stack-2x icon_notice"></i>
                        <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                    {{ trans('client.your_request_add_new_book') }}
                    <b>'{{ getDataFromAdminNotification($notice)['nameBook'] }}'</b>
                    {{ trans('client.was_success') }}
                </a>
                @endforeach
            </div>
        </div>
    </div>
</div>
@endsection
