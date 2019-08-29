@extends('user.layouts.master')
@section('title', 'Home Page')
@section('content')
<div class="container above" style="margin-top: 150px; margin-bottom: 100px">
    <div class="row ml-5">
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2 text-center">
            <img src="https://307a0e78.vws.vegacdn.vn/view/v2/image/img.book/0/0/0/3491.jpg?v=2&w=340&h=497" alt="">
            <h5 class="mt-3">Voted (100)</h5>
            <p>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
                <i class="fa fa-star-o"></i>
            </p>
            <p class="btn btn-sm btn-primary">Send</p>

        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-8 right ml-5">
            <h3>This is the name of book</h3>
            <p>Author: <span class="text-secondary">Name of Author</span></p>
            <p>Category: <span class="text-secondary">Name of Category</span></p>
            <p>Publisher: <span class="text-secondary">Name of Publisher</span></p>
            <p>Date: <span class="text-secondary">2019/08/10</span></p>
            <a href="#" class="btn btn-sm btn-success mt-3">Read book</a>
            <div class="description mt-3">
Tóm tắt cuốn sách "Biến Bất Kỳ Ai Thành Khách Hàng (Get Cilients Now)": Nếu đã sẵn sàng gia tăng số lượng khách hàng thì Biến bất kỳ ai thành khách hàng chính là cuốn sách mà bạn cần đọc!

Tập trung hướng vào hàng loạt các thủ thuật, công cụ, và chiến lược dễ sử dụng, phù hợp cho mọi hình thức kinh doanh dịch vụ chuyên nghiệp, cuốn sách hữu ích này mang đến cho bạn một chương trình 28 ngày duy nhất đã được kiểm nghiệm giúp cho việc khoanh vùng, định vị, thu hút và giữ khách hàng mới với số lượng lớn hơn nhiều những gì bạn từng mong ước có thể!

Bạn sẽ biết :

• Lựa chọn chiến thuật marketing phù hợp với hoàn cảnh và tính cách.

• Xác định những sai sót trong hoạt động marketing và cách khắc phục.

• Sử dụng các chiến thuật tiếp thị qua Internet - mạng xã hội trực tuyến.

• Thay thế những phương pháp marketing rời rạc, thiếu hiệu quả bằng các chiến lược marketing mới thông qua các mối quan hệ mang lại hiệu quả cao.

• Và còn nhiều điều hơn thế.

Biến bất kỳ ai thành khách hàng sẽ giúp bạn vượt qua nỗi sợ hãi, sức ì, tâm lý trì hoãn – những thứ đang cản trở bạn hành động hiệu quả. Bạn sẽ thấy lượng khách hàng tăng theo cấp số nhân và  lợi nhuận cũng vậy!

Mời các bạn đón đọc cuốn sách "Biến Bất Kỳ Ai Thành Khách Hàng (Get Cilients Now) - C. J. Hayden"
            </div>
        </div>
        <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">

        </div>
    </div>
</div>

<div class="container under ml-5">
     <h4 class="ml-5 mb-5 mt-5">Review</h4>
    <div class="row ml-5">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                        <img src="https://www.takadada.com/wp-content/uploads/2019/01/1-65.jpg" alt="">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-10">
                        <form action="">
                             <textarea name="" style="width: 100%; height: 70px;"></textarea>
                        </form>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                        <button type="submit" class="btn btn-primary">Send</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10 mt-3 ">
            <div class="container-fluid comment">
                <div class="row mt-2">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                        <img src="https://www.takadada.com/wp-content/uploads/2019/01/1-65.jpg" alt="">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-11">
                        <p style="font-size: 12px"><b>Phamtrungdung@gmail.com</b></p>
                        <div class="comment_content mt-1">
                            Tóm tắt cuốn sách "Biến Bất Kỳ Ai Thành Khách Hàng (Get Cilients Now)": Nếu đã sẵn sàng gia tăng số lượng khách hàng thì Biến bất kỳ ai thành khách hàng chính là cuốn sách mà bạn cần đọc! Tập trung hướng vào hàng loạt các thủ thuật, công cụ, và chiến lược dễ sử dụng, phù hợp cho mọi hình thức kinh
                        </div>
                        <p><span class="fa fa-thumbs-up"></span ><span class="fa fa-thumbs-down ml-3"></span><span class="ml-3 reply_btn" id="1">reply</span></p>
                        <div class="container-fluid reply" id="reply1">
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img src="https://www.takadada.com/wp-content/uploads/2019/01/1-65.jpg" alt="">
                                </div>
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-11">
                                    <textarea name="" style="width: 100%; height: 30px"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                    <a href="#" class="btn btn-sm btn-primary">Send</a>
                                    <a href="#" class="btn btn-sm btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                        <img src="https://www.takadada.com/wp-content/uploads/2019/01/1-65.jpg" alt="">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-11">
                        <p style="font-size: 12px"><b>Phamtrungdung@gmail.com</b></p>
                        <div class="comment_content mt-1">
                            Tóm tắt cuốn sách "Biến Bất Kỳ Ai Thành Khách Hàng (Get Cilients Now)": Nếu đã sẵn sàng gia tăng số lượng khách hàng thì Biến bất kỳ ai thành khách hàng chính là cuốn sách mà bạn cần đọc! Tập trung hướng vào hàng loạt các thủ thuật, công cụ, và chiến lược dễ sử dụng, phù hợp cho mọi hình thức kinh
                        </div>
                        <p><span class="fa fa-thumbs-up"></span ><span class="fa fa-thumbs-down ml-3"></span><span class="ml-3 reply_btn" id="2">reply</span></p>
                        <div class="container-fluid reply" id="reply2">
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img src="https://www.takadada.com/wp-content/uploads/2019/01/1-65.jpg" alt="">
                                </div>
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-11">
                                    <textarea name="" style="width: 100%; height: 30px"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                    <a href="#" class="btn btn-sm btn-primary">Send</a>
                                    <a href="#" class="btn btn-sm btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 parent">
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-1">
                        <img src="https://www.takadada.com/wp-content/uploads/2019/01/1-65.jpg" alt="">
                    </div>
                    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-11">
                        <p style="font-size: 12px"><b>Phamtrungdung@gmail.com</b></p>
                        <div class="comment_content mt-1">
                            Tóm tắt cuốn sách "Biến Bất Kỳ Ai Thành Khách Hàng (Get Cilients Now)": Nếu đã sẵn sàng gia tăng số lượng khách hàng thì Biến bất kỳ ai thành khách hàng chính là cuốn sách mà bạn cần đọc! Tập trung hướng vào hàng loạt các thủ thuật, công cụ, và chiến lược dễ sử dụng, phù hợp cho mọi hình thức kinh
                        </div>
                        <p><span class="fa fa-thumbs-up"></span ><span class="fa fa-thumbs-down ml-3"></span><span class="ml-3 reply_btn" id="3">reply</span></p>
                        <div class="container-fluid reply" id="reply3">
                            <div class="row">
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
                                    <img src="https://www.takadada.com/wp-content/uploads/2019/01/1-65.jpg" alt="">
                                </div>
                                <div class="col-xs-1 col-sm-1 col-md-1 col-lg-11">
                                    <textarea name="" style="width: 100%; height: 30px"></textarea>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right mt-2">
                                    <a href="#" class="btn btn-sm btn-primary">Send</a>
                                    <a href="#" class="btn btn-sm btn-secondary">Cancel</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>
</div>
@endsection
