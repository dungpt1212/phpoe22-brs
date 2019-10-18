@extends('user.layouts.master')
@section('title',trans('client.change_profile') )
@section('content')
<div class="container top">
    <h3 class="text-center mb-4 border_bottom">{{ trans('client.your_profile') }}</h3>
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 shadow">
        <form action="{{ route('profile-edit-post') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if(session('msg'))
            <div class="alert alert-success">
                <strong>{{ session('msg') }}</strong>
            </div>
        @endif
            <table class="table ">
                <tbody>
                    <tr>
                        <td>{{ trans('client.email') }}:</td>
                        <td><input type="email" class="form-control" value="{{ Auth::user()->email }}" readonly></td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.name') }}:</td>
                        <td>
                            <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}" placeholder="{{ trans('client.enter_name') }}">
                            @if($errors->has('name'))
                                <span class="text text-danger">{{ $errors->first('name') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.avatar') }}:</td>
                        <td>
                            @if(empty(Auth::user()->avatar))
                                <img src="{{ config('constant.avatar_empty') }}" class="img_profile">
                            @else
                                <img src="{{ Auth::user()->avatar }}" class="img_profile">
                            @endif

                            <input type="file" name="avatar" onchange="encodeImageFileAsURL(this)">
                            @if($errors->has('avatar'))
                                <span class="text text-danger">{{ $errors->first('avatar') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.password') }}</td>
                        <td>
                            <input type="password" class="form-control" name="password" placeholder="{{ trans('client.new_pass') }}">
                            @if($errors->has('password'))
                                <span class="text text-danger">{{ $errors->first('password') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td>{{ trans('client.confirm_password') }}</td>
                        <td>
                            <input type="password" class="form-control" name="password_confirmation" placeholder="{{ trans('client.confirm_pass') }}">
                            @if($errors->has('confirm_pass'))
                                <span class="text text-danger">{{ $errors->first('confirm_pass') }}</span>
                            @endif
                        </td>
                    </tr>
                    <tr>
                        <td><input type="submit" class="btn btn-primary" value="{{ trans('client.update') }}"></td>
                        <td></td>
                    </tr>
                </tbody>
            </table>
        </form>
      </div>
    </div>
</div>
@endsection

