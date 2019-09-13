@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
    <div class="container col-md-12 col-md-offset-2">
        <div class="card mt-5">
            <div class="card-header ">
                <h5 class="float-left">{{ trans('admin.edit_book') }}</h5>
                <div class="clearfix"></div>
            </div>
            <div class="card-body mt-2">
                <form method="post" action="{{ route('book.update', ['book' => $data->id]) }}" enctype="multipart/form-data">
                    @method('PUT')
                    @foreach ($errors->all() as $error)
                        <p class="alert alert-danger">{{ $error }}</p>
                    @endforeach
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    @csrf
                    <fieldset>
                        <div class="form-group">
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="title" name="title" placeholder="{{ trans('admin.title')}}" value="{{ $data->title }}">
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <textarea class="form-control" id="editor1" name="book_content" placeholder="{{ trans('admin.book_content')}}">{{ $data->book_content }}</textarea>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                @if ($data->image)
                                    <img class="edit_img" src="{{ asset('images/' . $data->image) }}" />
                                @endif
                                <input type="file" class="form-control" id="image" name="image">
                            </div>
                            <br>
                                {{-- Error  --}}
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="number_page" name="number_page" placeholder="{{ trans('admin.number_page') }}" value="{{ $data->number_page }}">
                            </div>
                            <br>
                            <div class="col-lg-3">
                                <select class="form-control" name="publisher_id">
                                    @foreach ($publishers as $publisher)
                                        <option value="{{ $publisher->id }}">{{ $publisher->publisher_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-lg-3">
                                <select class="form-control" name="category_id">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->category_name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <br>
                            <div class="col-lg-12">
                                <input type="text" class="form-control" id="price" name="price" placeholder="{{ trans('admin.price') }}" value="{{ $data->price }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-lg-10 col-lg-offset-2">
                                <button class="btn btn-default">{{ trans('admin.cancel') }}</button>
                                <button type="submit" class="btn btn-primary">{{ trans('admin.update') }}</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
