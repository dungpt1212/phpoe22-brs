@extends('user.layouts.master')
@section('title', 'Home Page')
@section('content')
<div class="container" style="margin-top: 100px">
  <h3 class="text-center mb-4 border_bottom">Register</h3>
  <div class="row">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 offset-3 p-4" style="border: 1px solid #f5f7f9; box-shadow: 0px 3px 66px -24px rgba(0, 0, 0, 0.2); background: #fff">
      <form method="POST" action="">

        <div class="form-group">
          <label for="name">Name:</label>
          <input id="name" type="text" class="form-control  is-invalid " name="name" value="" required autocomplete="name" autofocus>

          <span class="invalid-feedback" role="alert">

          </span>

        </div>
        <div class="form-group">
          <label for="pwd">Email:</label>
          <input id="email" type="email" class="form-control  is-invalid " name="email" value="" required autocomplete="email">
          <span class="invalid-feedback" role="alert">

          </span>

        </div>
        <div class="form-group">
          <label for="pwd">Password:</label>
          <input id="password" type="password" class="form-control is-invalid " name="password" required autocomplete="new-password">

          <span class="invalid-feedback" role="alert">
            <strong></strong>
          </span>

        </div>
        <div class="form-group">
          <label for="pwd">Confirm password:</label>
           <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
        </div>
        <button type="submit" class="btn btn-sm btn-primary">Đăng ký</button>
      </form>
    </div>
  </div>
</div>
@endsection

