@extends('user.layouts.master')
@section('title', 'Home Page')
@section('content')
<div class="container" style="margin-top: 100px">
<h3 class="text-center mb-4 border_bottom">Send require to admin to update new books</h3>
<div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2" style="border: 1px solid #f5f7f9; box-shadow: 0px 3px 66px -24px rgba(0, 0, 0, 0.2); background: #fff">
          <form action="" method="POST">
            @csrf
            <table class="table ">
              <tbody>
                <tr>
                  <td>Name of Book:</td>
                  <td> <input type="text" class="form-control" name="name" value=""></td>
              </tr>
              <tr>
                  <td>Name of Author:</td>
                  <td>
                    <input type="text" class="form-control" name="name" value="">
                    <span class="text text-danger"></span>
                </td>
            </tr>
            <tr>
              <td>Massage:</td>
              <td><textarea class="form-control" id="" style="width: 100%"></textarea></td>
          </tr>
    <tr>
      <td><input type="submit" class="btn btn-sm btn-primary" value="Send to admin" name="btn_capnhat"></td>
      <td></td>
  </tr>
</tbody>
</table>
</form>
</div>
</div>
</div>
@endsection
