@extends('user.layouts.master')
@section('title', trans('client.your_require'))
@section('content')
    <div class="container top">
        <h3 class="text-center mb-4 border_bottom">{{ trans('client.list_require') }}</h3>
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('client.book_name') }}</th>
                            <th>{{ trans('client.author_name') }}</th>
                            <th>{{ trans('client.message') }}</th>
                            <th>{{ trans('client.status') }}</th>
                            <th>
                                <a href="{{ route('require.create') }}" class="btn btn-sm btn-success">{{ trans('client.new_require') }}</a>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                            <tr>
                                <td>{{ $requireBook->book_name }}</td>
                                <td>{{ $requireBook->author }}</td>
                                <td>{{ $requireBook->request_content }}</td>
                                <td>
                                    @if ($requireBook->status == \App\Enums\Status::Resolve)
                                        <b>{{ trans('admin.resolve') }}</b>
                                    @elseif ($requireBook->status == \App\Enums\Status::Processing)
                                        {{ trans('admin.processing') }}
                                    @endif
                                </td>
                                <td>
                                    @if($requireBook->status == trans('client.processing'))
                                        <a href="{{ route('require.edit', $requireBook->id) }}" class="btn btn-sm btn-primary btn_require_edit">{{ trans('client.edit') }}</a>
                                        <form action="{{ route('require.destroy', $requireBook->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger">{{ trans('client.delete') }}</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                    </tbody>
                  </table>
            </div>
        </div>
    </div>
@endsection
