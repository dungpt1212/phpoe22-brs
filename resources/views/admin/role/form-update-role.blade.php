@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<h3 class="text-center mt-4">{{ trans('admin.update_role') }}</h3>
<div class="container">
    <form action="{{ route('role.update', ['role' => $role->id]) }}" method="POST">
    @csrf
    @method('PUT')
      <div class="form-group">
        <label for="">{{ trans('admin.name') }}</label>
        <input type="text" class="form-control" name="name" value="{{ $role->name }}" placeholder="Enter name">
    </div>
    <div class="form-group">
        <label for="">{{ trans('admin.display_name') }}</label>
        <input type="text" class="form-control" name="display_name" value="{{ $role->display_name }}" placeholder="Enter display_name">
    </div>
    <div class="form-group">
        <label for="">{{ trans('admin.description') }}</label>
        <input type="text" class="form-control" name="description" value="{{ $role->description }}" placeholder="Enter description">
    </div>
    {{  trans('admin.permission') }}
    <div class="form-check">
        <ul class="ul_permission">
            @foreach($permissions as $permission)
                <li>
                    <input class="form-check-input" type="checkbox" name="permission[]" value="{{ $permission->id }}" {{ in_array($permission->id, $role_permissions) ? "checked" : "" }}>
                    <label class="form-check-label" for="defaultCheck1">
                        {{ $permission->name }}
                    </label>
                </li>
            @endforeach
        </ul>
    </div>
    <button type="submit" class="btn btn-primary">{{ trans('admin.update') }}</button>
</form>
</div>

@endsection
