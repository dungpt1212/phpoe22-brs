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

                @if (Auth::check())
                    <li class="history" title="{{ trans('client.reading_book') }}"><a class="fa fa-book mr-4" href="{{ route('reading-book') }}"></a></li>
                    <li class="history" title="{{ trans('notification') }}">
                        <a class="fa fa-bell-o bell_notice" href="javascript:void(0)"></a>
                        <span class="badge badge-danger mr-4">{{ Auth::user()->unreadNotifications->count() }}</span>
                    </li>
                    <div class="notice" id="notice">
                        <p class="text-center">
                            <b>
                                <i>
                                    {{ trans('client.you_have') }}
                                    {{ Auth::user()->unreadNotifications->count() }}
                                    {{ trans('client.new_notice') }}
                                </i>
                            </b>
                        </p>
                        <div class="list-group">
                            @foreach ($notifications as $notice)
                                <a href="{{ route('user-notification.detail',
                                        [
                                        'idRequire' => getDataFromAdminNotification($notice)['idRequire'],
                                        'idNotice' => $notice->id,
                                        ]) }}"
                                    class="list-group-item list-group-item-action {{ ($notice->read_at == null) ? 'read_notice' : ''}}">
                                    <span class="fa-stack fa-lg">
                                        <i class="fa fa-circle fa-stack-2x icon_notice"></i>
                                        <i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                                    </span>
                                    {{ trans('client.your_request_add_new_book') }}
                                    <b>'{{ getDataFromAdminNotification($notice)['nameBook'] }}'</b>
                                    {{ trans('client.was_success') }}
                                </a>
                            @endforeach
                        </div>
                        <p class="mt-3 mb-3 text-center"> <a href="{{ route('user-notification.all') }}" >{{ trans('client.view_all_notice') }}</a></p>
                    </div>
                @endif
            </li>
            @if (Auth::check())
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
                                        <a class="currency-trigger" href="{{ route('profile-following') }}">{{ trans('client.following') }}</a>
                                        <a class="currency-trigger" href="{{ route('profile-follower') }}">{{ trans('client.follower') }}</a>
                                        <a class="currency-trigger logout" href="javascript:void(0)">
                                            {{ trans('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST">
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
    <form id="search_mini_form" class="minisearch" action="{{ route('user-search') }}" method="GET">
        @csrf
        <div class="field__search">
            <input type="text" placeholder="{{ trans('search') }}" name="keyword">
            <div class="action">
               <!--  <a href="#"><i class="zmdi zmdi-search"></i></a> -->
                <button type="submit" class="zmdi zmdi-search" >{{ trans('search') }}</button>
            </div>
        </div>
    </form>
    <div class="close__wrap">
        <span>{{ trans('client.close') }}</span>
    </div>
</div>
<!-- End Search Popup -->
