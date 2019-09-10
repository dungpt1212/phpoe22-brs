@extends('user.layouts.master')
@section('title',trans('client.home'))
@section('content')
<!-- Start BEst Seller Area -->
<section class="wn__product__area brown--color pt--80  pb--30 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">{{ trans('client.new') }} <span class="color--theme">{{ trans('client.updated_books') }}</span></h2>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--20">
            <!-- Start Single Product -->
            @foreach ($newUpdatedBooks as $book)
                <div class="product product__style--3">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="product__thumb">
                            <a class="first__img" href="#"><img src="{{ $book->image }}"></a>
                            <a class="second__img animation1" href="#"><img src=""></a>
                            <div class="hot__box">
                                <span class="hot-label">{{ trans('client.new') }}</span>
                            </div>
                        </div>
                        <div class="product__content content--center">
                            <h4><a href="#">{{ $book->title }}</a></h4>
                            <ul class="prize d-flex">
                                <li>{{ trans('client.publisher') }} : {{ $book->publisher->publisher_name }}</li>
                                <li class="text-secondary"></li>
                                <li>{{ trans('client.views') }} : {{ $book->view }}  </li>
                            </ul>
                            <div class="action">
                                <div class="actions_inner">
                                    <ul class="add_to_links">
                                        <li><a class="compare" href="{{ route('book-read', ['id' => $book->id]) }}" title="{{ trans('client.read_now') }}"><i class="bi bi-book" ></i></a></li>
                                        <li><a title="{{ trans('client.detail') }}" class="quickview modal-view detail-link" href="{{ route('book-detail', ['id' => $book->id]) }}"><i class="bi bi-search"></i></a></li>
                                        <li><a class="compare" href="#"><i class="bi bi-heart-beat" title="{{ trans('client.favorite') }}"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__hover--content">
                                <ul class="rating d-flex">
                                    @include('user.layouts.display-rate')
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Start Single Product -->
            @endforeach
        </div>
    </div>
<!-- End Single Tab Content -->
</section>


<section class="wn__product__area brown--color pt--80  pb--30 mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section__title text-center">
                    <h2 class="title__be--2">{{ trans('client.the_highest') }}<span class="color--theme"> {{ trans('client.viewed_books') }}</span></h2>
                </div>
            </div>
        </div>
        <!-- Start Single Tab Content -->
        <div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--20">
           <!-- Start Single Product -->
            @foreach ($highestViewedBooks as $book)
                <div class="product product__style--3">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-12">
                        <div class="product__thumb">
                            <a class="first__img" href="#"><img src="{{ $book->image }}"></a>
                            <a class="second__img animation1" href="#"><img src=""></a>
                            <div class="hot__box">
                                <span class="hot-label">{{ trans('client.new') }}</span>
                            </div>
                        </div>
                        <div class="product__content content--center">
                            <h4><a href="#">{{ $book->title }}</a></h4>
                            <ul class="prize d-flex">
                                <li>{{ trans('client.publisher') }} : {{ $book->publisher->publisher_name }}</li>
                                <li class="text-secondary"></li>
                                <li>{{ trans('client.views') }} : {{ $book->view }}  </li>
                            </ul>
                            <div class="action">
                                <div class="actions_inner">
                                    <ul class="add_to_links">
                                        <li><a class="compare" href="{{ route('book-read', ['id' => $book->id]) }}" title="{{ trans('client.read_now') }}"><i class="bi bi-book" ></i></a></li>
                                        <li><a title="{{ trans('client.detail') }}" class="quickview modal-view detail-link" href="{{ route('book-detail', ['id' => $book->id]) }}"><i class="bi bi-search"></i></a></li>
                                        <li><a class="compare" href="#"><i class="bi bi-heart-beat" title="{{ trans('client.favorite') }}"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product__hover--content">
                                @include('user.layouts.display-rate')
                            </div>
                        </div>
                    </div>
                </div>
        <!-- Start Single Product -->
            @endforeach
        </div>
    </div>
<!-- End Single Tab Content -->
</section>
@endsection
