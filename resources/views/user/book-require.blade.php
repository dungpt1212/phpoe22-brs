@extends('user.layouts.master')
@section('title', trans('client.your_require'))
@section('content')

<div class="container top">
    @if(Auth::check())
        <h3 class="text-center mb-4 border_bottom">{{ trans('client.send_require_to_admin') }}</h3>
        <div class="row">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8  offset-2 text-right">
                <a href="{{ route('require.index') }}" class="btn btn-sm btn-success">{{ trans('client.list_require') }}</a>
            </div>
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 shadow">
                @if(session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
                <form action="{{ route('require.store') }}" method="POST">
                    @csrf
                    <table class="table ">
                        <tbody>
                            <tr>
                                <td>{{ trans('client.book_name') }}:</td>
                                <td>
                                    <input type="text" class="form-control" name="book_name" value="{{ old('book_name') }}">
                                    @if($errors->has('book_name'))
                                        <small class="text-danger">{{ $errors->first('book_name') }}</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ trans('client.author_name') }}:</td>
                                <td>
                                    <input type="text" class="form-control" name="author" value="{{ old('author') }}">
                                    @if($errors->has('author'))
                                        <small class="text-danger">{{ $errors->first('author') }}</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td>{{ trans('client.massage') }}:</td>
                                <td>
                                    <textarea class="form-control" name="request_content" id="text_area">{{ old('request_content') }}</textarea>
                                    @if($errors->has('request_content'))
                                        <small class="text-danger">{{ $errors->first('request_content') }}</small>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="btn btn-sm btn-primary" value="{{ trans('client.send_to_admin') }}"></td>
                                <td></td>
                            </tr>
                         </tbody>
                     </table>
                </form>
            </div>
        </div>
    @else
        <h5 class="text-center pt-5"><i>{{ trans('client.login_to_require') }}</i></h5>
    @endif
</div>

@endsection
