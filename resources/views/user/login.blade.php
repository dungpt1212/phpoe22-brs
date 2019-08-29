@extends('user.layouts.master')
@section('title', 'Home Page')
@section('content')
<div class="container" style="margin-top: 100px">
  <h3 class="text-center mb-4 border_bottom">login</h3>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-3 p-4" style="border: 1px solid #f5f7f9; box-shadow: 0px 3px 66px -24px rgba(0, 0, 0, 0.2); background: #fff">
      <form method="POST" action="">
        @csrf

        <div class="form-group">
          <label for="email">Email address:</label>
          <input id="email" type="email" class="form-control  is-invalid  name="email" value="" required  autocomplete="email" autofocus>

          <span class="invalid-feedback" role="alert">

          </span>

        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input id="password" type="password" class="form-control is-invalid " name="password" required autocomplete="current-password">


          <span class="invalid-feedback" role="alert">

          </span>

        </div>
        <div class="form-group form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" > Remember me
            <label class="form-check-label" for="remember">

            </label>
          </label>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Đăng nhập</button>
      </form>
    </div>
  </div>
</div>
@endsection

