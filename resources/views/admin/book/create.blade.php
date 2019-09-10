@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
    <div class="container col-md-12 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">{{ trans('admin.create_book') }}</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                <form method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <fieldset>
                        @csrf
                        <div class="form-group">
                            <label for="title" class="col-lg-12 control-label">{{ trans('admin.book') }}</label>
                            <div class="col-lg-12">
                                <label>{{ trans('admin.title') }}</label>
                                <input type="text" class="form-control" name="title" id="title" placeholder="{{ trans('admin.title') }}">
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <label>{{ trans('admin.author') }}</label>
                                @foreach ($authors as $author)
                                <ul>
                                    <li class="author">
                                        <input type="checkbox" name="author[]" value="{{ $author->id }}">
                                        {{ $author->author_name }}
                                    </li>
                                </ul>
                                @endforeach
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <label>{{ trans('admin.book_content') }}</label>
                                <textarea class="form-control" id="editor1" name="book_content" placeholder="{{ trans('admin.book_content') }}"></textarea>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <label>{{ trans('admin.image') }}</label>
                                <input type="file" class="form-control-file" name="image" id="image" placeholder="{{ trans('admin.image') }}">
                            </div>
                            <br>
                            <div class="col-lg-3">
                                <label>{{ trans('admin.number_page') }}</label>
                                <input type="text" class="form-control" name="number_page" id="number_page" placeholder="{{ trans('admin.number_page') }}">
                            </div>
                            <br>
                            <div class="col-lg-3">
                                <label>{{ trans('admin.publisher') }}</label>
                                <select class="form-control" name="publisher_id">
                                    <option>{{ trans('admin.choose_a_publisher') }}</option>
                                    @foreach ($publishers as $data)
                                        <option value="{{ $data->id }}">{{ $data->publisher_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-lg-3">
                                <label>{{ trans('admin.category') }}</label>
                                <select class="form-control" name="category_id">
                                    <option>{{ trans('admin.choose_a_category') }}</option>
                                    @foreach ($categories as $data)
                                        <option value="{{ $data->id }}">{{ $data->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-lg-3">
                                <label>{{ trans('admin.price') }}</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="{{ trans('admin.price') }}">
                            </div>
                            <br>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button class="btn btn-default">{{ trans('admin.cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ trans('admin.create_book') }}</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
