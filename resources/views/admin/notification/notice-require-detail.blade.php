@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover table-bordered dataTable no-footer">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">{{ trans('admin.id') }}
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">{{ trans('admin.book_name') }}
                                        </th>
                                        <th class="sorting_bsc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">{{ trans('admin.request_content') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">{{ trans('admin.user_id') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">{{ trans('admin.status') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">{{ trans('admin.edit') }}
                                        </th>
                                    </tr>
                                </thead>

                                <tbody class="tbody">
                                        <tr role="row" class="odd{{ $requireBook->id }}">
                                            <td class="sorting_1">{{ $requireBook->id }}</td>
                                            <td class="sorting_1">{{ $requireBook->book_name }}</a></td>
                                            <td class="sorting_1">{{ $requireBook->request_content }}</td>
                                            <td class="sorting_1">{{ $requireBook->user->name }}</td>
                                            <td class="sorting_1"><b>
                                                @if ($requireBook->status == \App\Enums\Status::Resolve)
                                                    {{ trans('admin.resolve') }}
                                                @elseif ($requireBook->status == \App\Enums\Status::Processing)
                                                    {{ trans('admin.processing') }}
                                                @endif
                                            </b>
                                            </td>
                                            <td>
                                                <button class="edit-modal btn btn-warning btn-sm" data-id="{{ $requireBook->id }}" data-book_name="{{ $requireBook->book_name }}" data-request_content="{{ $requireBook->request_content }}" data-user_id="{{ $requireBook->user_id }}" data-status="{{ $requireBook->status }}">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                            </td>
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Form Edit Request New Book  --}}
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <form class="form-horizontal" role="modal">
                    @csrf
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="book_name">{{ trans('admin.book_name') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="book_name" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-5" for="request_content">{{ trans('admin.request_content') }}</label>
                        <div class="col-sm-12">
                            <textarea type="text" class="form-control" id="request_content" disabled></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="user_id">{{ trans('admin.user_id') }}</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="user_id" disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="status">{{ trans('admin.status') }}</label>
                        <div class="col-sm-4">
                            <select id="status" name="status" class="form-control">
                                <option value="1">{{ trans('admin.resolve') }}</option>
                                <option value="0">{{ trans('admin.processing') }}</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn actionBtn" data-dismiss="modal">
                    <span id="footer_action_button" class="glyphicon glyphicon-plus"></span>
                </button>
                <button type="button" class="btn btn-warning" data-dismiss="modal">
                    <span class=" glyphicon glyphicon-remove "></span> {{ trans('admin.close') }}
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
