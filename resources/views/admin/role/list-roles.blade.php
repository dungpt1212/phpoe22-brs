@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<h3 class="text-center mt-4">{{ trans('admin.list_role') }}</h3>
<div class="container">
    <table class="table table-hover">
        @if (session('status'))
            <div class="alert alert-success">
                <strong>{{ trans('admin.success') }}</strong> {{ session('status') }}
            </div>
        @endif
        <thead>
            <tr>
                <th>{{ trans('admin.stt') }}</th>
                <th>{{ trans('admin.name') }}</th>
                <th>{{ trans('admin.description') }}</th>
                <th>{{  trans('admin.permission') }}</th>
                <th><a class="btn btn-sm btn-success" href="{{ route('role.create') }}">{{ trans('admin.add') }}</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($roles as $role)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $role->name }}</td>
                <td>{{ $role->description }}</td>
                <td>
                    @foreach ($role->perms as $perm)
                    <li>{{ $perm->name }}</li>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-primary btn-sm btn_format" href="{{ route('role.edit', ['role' => $role->id]) }}">{{ trans('admin.edit') }}</a>
                    <form action="{{ route('role.destroy', ['role' => $role->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm btn_format">{{ trans('admin.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
