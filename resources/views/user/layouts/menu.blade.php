 <header id="wn__header" class="header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <div class="logo">
                    <a href="index.html">
                        <img src="{{ asset(config('constant.logo')) }}">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                    <ul class="meninmenu d-flex justify-content-start">
                        <li class="drop with--one--item"><a href="{{ route('homepage') }}">{{ trans('client.home') }}</a></li>
                        <li class="drop"><a href="javascript: void(0)">{{ trans('client.books') }}</a>
                            <div class="megamenu mega03">
                                <ul class="item item03">
                                    <li class="title">{{ trans('client.category') }}</li>
                                    @foreach ($bookCategories as $category)
                                        <li><a href="{{ route('book-category', ['id' => $category->id]) }}">{{ $category->category_name }}</a></li>
                                    @endforeach
                                </ul>
                                <ul class="item item03">
                                    <li class="title">{{ trans('client.author') }}</li>
                                    @foreach ($authors as $author)
                                        <li><a href="{{ route('book-author', ['id' => $author->id]) }}">{{ $author->author_name }}</a></li>
                                    @endforeach
                                </ul>
                                <ul class="item item03">
                                    <li class="title">{{ trans('client.publisher') }}</li>
                                    @foreach ($publishers as $publisher)
                                        <li><a href="{{ route('book-publisher', ['id' => $publisher->id]) }}">{{ $publisher->publisher_name }}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                        </li>
                        <li><a href="{{ route('require.create') }}">{{ trans('client.your_require') }}</a></li>
                        @if (!Auth::check())
                            <li><a href="{{ route('login') }}">{{ trans('client.sign_in') }}</a></li>
                            <li><a href="{{ route('register') }}">{{ trans('client.register') }}</a></li>
                        @endif
                    </ul>
                </nav>
            </div>
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shop_search" title="{{ trans('client.search') }}"><a class="search__active" href="#"></a></li>
                    <li class="wishlist" title="{{ trans('client.your_favorite') }}"><a href="{{ route('book-favorite') }}"></a></li>
                </li>
                <li class="history" title="{{ trans('client.history_activity') }}"><a class="fa fa-history mr-4" href="{{ route('activity') }}"></a></li>
            </li>
            @if(Auth::check())
                <li class="setting__bar__icon" title="{{ trans('client.manage_profile') }}"><a class="setting__active" href="#"></a>
                    <div class="searchbar__content setting__block">
                        <div class="content-inner">
                            <div class="switcher-currency">
                                <strong class="label switcher-label">
                                    <span>{{ Auth::user()->name }}</span>
                                </strong>
                                <div class="switcher-options">
                                    <div class="switcher-currency-trigger">
                                        <a class="currency-trigger" href="{{ route('profile-edit') }}">{{ trans('client.change_profile') }}</a>
                                        <a class="currency-trigger" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            @endif
        </ul>
    </div>
</div>
<div class="mobile-menu d-block d-lg-none">
</div>
<!-- Mobile Menu -->
</div>
</header>
<!-- //Header -->

<!-- Start Search Popup -->
<div class="brown--color box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="#">
        <div class="field__search">
            <input type="text" placeholder="{{ trans('search') }}">
            <div class="action">
                <a href="#"><i class="zmdi zmdi-search"></i></a>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>{{ trans('client.close') }}</span>
    </div>
</div>
<!-- End Search Popup -->
