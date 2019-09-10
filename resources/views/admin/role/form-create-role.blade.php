@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<h3 class="text-center mt-4">{{ trans('admin.add_role') }}</h3>
<div class="container">
    <form action="{{ route('role.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="">{{ trans('admin.name') }}</label>
            <input type="text" class="form-control" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="">{{ trans('admin.display_name') }}</label>
            <input type="text" class="form-control" name="display_name" placeholder="Enter display_name">
        </div>
        <div class="form-group">
            <label for="">{{ trans('admin.description') }}</label>
            <input type="text" class="form-control" name="description" placeholder="Enter description">
        </div>
        {{ trans('admin.permission') }}
        <div class="form-check">
            <ul class="ul_permission">
                @foreach($permissions as $permission)
                <li>
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}">
                    <label class="form-check-label" for="defaultCheck1">
                        {{ $permission->name }}
                    </label>
                </li>
                @endforeach
            </ul>
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('admin.create') }}</button>
    </form>
</div>

@endsection
