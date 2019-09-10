@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<h3 class="text-center mt-4">{{ trans('admin.list_user') }}</h3>
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
                <th>{{ trans('admin.email') }}</th>
                <th>{{ trans('admin.role') }}</th>
                <th><a class="btn btn-sm btn-success" href="{{ route('user.create') }}">{{ trans('admin.add') }}</a></th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    @foreach ($user->roles as $role)
                    <li>{{ $role->name }}</li>
                    @endforeach
                </td>
                <td>
                    <a class="btn btn-primary btn-sm btn_format" href="{{ route('user.edit', ['user' => $user->id]) }}">{{ trans('admin.edit') }}</a>
                    <form action="{{ route('user.destroy', ['user' => $user->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm btn_format" type="submit">{{ trans('admin.delete') }}</button>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
@endsection
