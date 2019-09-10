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
                            <table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">{{ trans('admin.id') }}
                                        </th>
                                        <th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending">{{ trans('admin.title') }}
                                        </th>
                                        <th class="sorting_bsc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending">{{ trans('admin.image') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending">{{ trans('admin.number_page') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Start date: activate to sort column ascending">{{ trans('admin.view') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">{{ trans('admin.publisher_id') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">{{ trans('admin.category_id') }}
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending">{{ trans('admin.price') }}
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($book as $data)
                                    <tr role="row" class="odd">
                                        <td class="sorting_1">{{ $loop->iteration }}</td>
                                        <td class="sorting_1"><a href="{{ route('book.show', ['book' => $data->id]) }}"> {{ $data->title }}</a></td>
                                        <td class="sorting_1"><img class="book_img" src="{{ asset('images/' . $data->image) }}" alt=""></img></td>
                                        <td class="sorting_1">{{ $data->number_page }}</td>
                                        <td class="sorting_1">{{ $data->view }}</td>
                                        <td class="sorting_1">{{ $data->publisher->publisher_name }}</td>
                                        <td class="sorting_1">{{ $data->category->category_name }}</td>
                                        <td class="sorting_1">{{ $data->price }}</td>

                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
