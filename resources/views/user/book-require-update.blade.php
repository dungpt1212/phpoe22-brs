@extends('user.layouts.master')
@section('title', trans('client.your_require'))
@section('content')

<div class="container top">
    <h3 class="text-center mb-4 border_bottom">{{ trans('client.edit') }}</h3>
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2 shadow">
            <form action="{{ route('require.update', $require->id) }}" method="POST">
                @csrf
                @method('PUT')
                <table class="table ">
                    <tbody>
                        <tr>
                            <td>{{ trans('client.book_name') }}:</td>
                            <td>
                                <input type="text" class="form-control" name="book_name" value="{{ $require->book_name }}">
                                @if($errors->has('book_name'))
                                    <small class="text-danger">{{ $errors->first('book_name') }}</small>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ trans('client.author_name') }}:</td>
                            <td>
                                <input type="text" class="form-control" name="author" value="{{ $require->author }}">
                                @if($errors->has('author'))
                                    <small class="text-danger">{{ $errors->first('author') }}</small>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td>{{ trans('client.massage') }}:</td>
                            <td>
                                <textarea class="form-control" name="request_content" id="text_area">{{ $require->request_content }}</textarea>
                                @if($errors->has('request_content'))
                                    <small class="text-danger">{{ $errors->first('request_content') }}</small>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><input type="submit" class="btn btn-sm btn-primary" value="{{ trans('client.edit') }}" name="btn_capnhat"></td>
                            <td></td>
                        </tr>
                     </tbody>
                 </table>
            </form>
        </div>
    </div>
</div>

@endsection
