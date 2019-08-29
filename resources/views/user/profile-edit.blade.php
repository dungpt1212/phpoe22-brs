@extends('user.layouts.master')
@section('title', 'Home Page')
@section('content')
<div class="container" style="margin-top: 100px">
    <h3 class="text-center mb-4 border_bottom">Trang cá nhân</h3>
    <div class="row">
        <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 offset-2" style="border: 1px solid #f5f7f9; box-shadow: 0px 3px 66px -24px rgba(0, 0, 0, 0.2); background: #fff">
          <form action="" method="POST">
            @csrf
            <table class="table ">
              <tbody>
                <tr>
                  <td>Email:</td>
                  <td>dung@gmail.com</td>
              </tr>
              <tr>
                  <td>Tên:</td>
                  <td>
                    <input type="text" class="" name="name" value="">
                    <span class="text text-danger"></span>
                </td>
            </tr>
            <tr>
              <td>Avatar:</td>
              <td><img src="/image/avatar/" alt="" ><input type="file" style="border: none"></td>
          </tr>
          <tr>
              <td>Đổi mật khẩu:</td>
              <td>
                <input type="password" class="" name="pass" placeholder="Nhập mật khẩu mới">
                <span class="text text-danger"></span>
            </td>
        </tr>
        <tr>
          <td>Xác nhận mật khẩu:</td>
          <td>
            <input type="password" class="" name="confirm_pass" placeholder="Xác nhận mật khẩu">
            <span class="text text-danger"></span>
        </td>
    </tr>
    <tr>
      <td><input type="submit" class="btn btn-primary" value="Cập nhật" name="btn_capnhat"></td>
      <td></td>
  </tr>
</tbody>
</table>
</form>
</div>
</div>
</div>
@endsection

