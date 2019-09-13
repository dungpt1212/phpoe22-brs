@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
    <div class="container col-md-12 col-md-offset-2 mt-5">
        <div class="card">
            <div class="card-header ">
                <h5 class="float-left">{{ $data->title }}</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body">
                <a href="{{ route('book.edit', $data->id) }}" class="btn btn-info">{{ trans('admin.edit') }}</a>
                <form method="post" action="{{ route('book.destroy', ['book' => $data->id]) }}" class="float-left">
                    @method('DELETE')
                    @csrf
                    <div>
                        <button type="submit" class="btn btn-warning">{{ trans('admin.delete') }}</button>
                    </div>
                </form>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection
