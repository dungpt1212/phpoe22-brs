@extends('admin.layouts.master')
@section('title', trans('admin.home'))
@section('main')
<h3 class="text-center mt-4">{{ trans('admin.update_user') }}</h3>
<div class="container">
    <form action="{{ route('user.update',['user' => $user->id]) }}" method="POST">
        @method('PUT')
        @csrf
        <div class="form-group">
            <label for="">{{ trans('admin.name') }}</label>
            <input type="text" class="form-control" name="name" value="{{ $user->name }}" placeholder="Enter name">
            @if($errors->has('name'))
                <p class="text-danger">{{ $errors->first('name') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="">{{ trans('admin.email') }}</label>
            <input type="email" class="form-control" name="email" value="{{ $user->email }}" placeholder="Enter Email" readonly="">
            @if($errors->has('email'))
                <p class="text-danger">{{ $errors->first('email') }}</p>
            @endif
        </div>
        <div class="form-group">
            <label for="">{{ trans('admin.password') }}</label>
            <input type="hidden" class="form-control" name="password" value="pass" placeholder="Enter Email" readonly="">
        </div>
        {{ trans('admin.role') }}
            @if($errors->has('role'))
                <span class="text-danger">{{ $errors->first('role') }}</span>
            @endif
        <div class="form-check">
            <ul class="ul_permission">
                @foreach ($roles as $role)
                <li>
                    <input class="form-check-input" type="checkbox" name="role[]" value="{{ $role->id }}" {{ in_array($role->id, $role_users) ? "checked" : "" }}>
                    <label class="form-check-label" for="defaultCheck1">
                        {{ $role->name }}
                    </label>
                </li>
                @endforeach
            </ul>
        </div>
        <button type="submit" class="btn btn-primary">{{ trans('admin.update') }}</button>
    </form>
</div>

@endsection
