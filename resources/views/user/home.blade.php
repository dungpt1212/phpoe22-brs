 @extends('user.layouts.master')
 @section('title', 'Home Page')
 @section('content')
 <!-- Start BEst Seller Area -->
 <section class="wn__product__area brown--color pt--80  pb--30 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">New <span class="color--theme">Updated Books</span></h2>
                    <!-- <p>I hate books; they only teach us to talk about things we know nothing about. ( Jean Jacques Rousseau )</p> -->
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--20">
           @for($i = 1; $i <= 6; $i++)
           <!-- Start Single Product -->
           <div class="product product__style--3">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="product__thumb">
                    <a class="first__img" href="single-product.html"><img src="https://media-ak.static-adayroi.com/sys_master/hda/ha1/10257701011486.jpg" alt="product image" width="200px" height="300px"></a>
                    <a class="second__img animation1" href="single-product.html"><img src="images/books/2.jpg" alt="product image"></a>
                    <div class="hot__box">
                        <span class="hot-label">New</span>
                    </div>
                </div>
                <div class="product__content content--center">
                    <h4><a href="single-product.html">Cô bé quàng khăn đỏ</a></h4>
                    <ul class="prize d-flex">
                        <li style="font-size: 10px">author:</li>
                        <li class="text-secondary" style="font-size: 10px; transform: translateX(-10px);">Pham Trung Dung</li>
                        <li style="font-size: 10px">views : 10 </li>
                    </ul>
                    <div class="action">
                        <div class="actions_inner">
                            <ul class="add_to_links">
                                <li><a class="compare" href="#" title="Read Now"><i class="bi bi-book" ></i></a></li>
                                <li><a title="Detail" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                <li><a class="compare" href="#"><i class="bi bi-heart-beat" title="Favorite"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product__hover--content">
                        <ul class="rating d-flex">
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Single Product -->
        @endfor
    </div>
</div>
<!-- End Single Tab Content -->
</div>
</section>


<section class="wn__product__area brown--color pt--80  pb--30 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">The highest <span class="color--theme"> Voted Books</span></h2>
                    <!-- <p>I hate books; they only teach us to talk about things we know nothing about. ( Jean Jacques Rousseau )</p> -->
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--20">
           @for($i = 1; $i <= 6; $i++)
           <!-- Start Single Product -->
           <div class="product product__style--3">
            <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                <div class="product__thumb">
                    <a class="first__img" href="single-product.html"><img src="https://media-ak.static-adayroi.com/sys_master/hda/ha1/10257701011486.jpg" alt="product image" width="200px" height="300px"></a>
                    <a class="second__img animation1" href="single-product.html"><img src="images/books/2.jpg" alt="product image"></a>
                    <div class="hot__box">
                        <span class="hot-label">New</span>
                    </div>
                </div>
                <div class="product__content content--center">
                    <h4><a href="single-product.html">Cô bé quàng khăn đỏ</a></h4>
                    <ul class="prize d-flex">
                        <li style="font-size: 10px">author:</li>
                        <li class="text-secondary" style="font-size: 10px; transform: translateX(-10px);">Pham Trung Dung</li>
                        <li style="font-size: 10px">views : 10 </li>
                    </ul>
                    <div class="action">
                        <div class="actions_inner">
                            <ul class="add_to_links">
                                <li><a class="compare" href="#" title="Read Now"><i class="bi bi-book" ></i></a></li>
                                <li><a title="Detail" class="quickview modal-view detail-link" href="#productmodal"><i class="bi bi-search"></i></a></li>
                                <li><a class="compare" href="#"><i class="bi bi-heart-beat" title="Favorite"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="product__hover--content">
                        <ul class="rating d-flex">
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li class="on"><i class="fa fa-star-o"></i></li>
                            <li><i class="fa fa-star-o"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- Start Single Product -->
        @endfor
    </div>
</div>
<!-- End Single Tab Content -->
</div>

</section>
@endsection

