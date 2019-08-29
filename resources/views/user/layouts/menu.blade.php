 <header id="wn__header" class="header__area header__absolute sticky__header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <div class="logo">
                            <a href="index.html">
                                <img src="assets/lib/images/logo/logo.png" alt="logo images">
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-8 d-none d-lg-block">
                        <nav class="mainmenu__nav">
                            <ul class="meninmenu d-flex justify-content-start">
                                <li class="drop with--one--item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="drop"><a href="javascript: void(0)">Books</a>
                                    <div class="megamenu mega03">
                                        <ul class="item item03">
                                            <li class="title">Categories</li>
                                            <li><a href="{{ route('book-category') }}">Văn học </a></li>
                                             <li><a href="{{ route('book-category') }}">Văn học </a></li>
                                              <li><a href="{{ route('book-category') }}">Văn học </a></li>
                                        </ul>
                                        <ul class="item item03">
                                            <li class="title">Authors</li>
                                            <li><a href="{{ route('book-category') }}">Nguyễn Nhật Ánh</a></li>
                                            <li><a href="{{ route('book-category') }}">Nguyễn Nhật Ánh</a></li>
                                            <li><a href="{{ route('book-category') }}">Nguyễn Nhật Ánh</a></li>
                                            <li><a href="{{ route('book-category') }}">Nguyễn Nhật Ánh</a></li>
                                        </ul>
                                        <ul class="item item03">
                                            <li class="title">Publishers</li>
                                            <li><a href="{{ route('book-category') }}">NXB. Giáo dục </a></li>
                                            <li><a href="{{ route('book-category') }}">NXB. Giáo dục </a></li>
                                            <li><a href="{{ route('book-category') }}">NXB. Giáo dục </a></li>
                                            <li><a href="{{ route('book-category') }}">NXB. Giáo dục </a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li><a href="{{ route('book-require') }}">Your Require</a></li>
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="{{ route('register') }}">Register</a></li>
                            </ul>
                        </nav>
                    </div>
                    <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                        <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                            <li class="shop_search" title="search"><a class="search__active" href="#"></a></li>
                            <li class="wishlist" title="your favorite"><a href="{{ route('book-favorite') }}"></a></li>
                            </li>
                             <li  style="font-size: 20px" title="History Activities"><a class="fa fa-history mr-4" href="{{ route('activity') }}"></a></li>
                            </li>
                            <li class="setting__bar__icon" title="manage profile"><a class="setting__active" href="#"></a>
                                <div class="searchbar__content setting__block">
                                    <div class="content-inner">
                                        <div class="switcher-currency">
                                            <strong class="label switcher-label">
                                                <span>Your Profile</span>
                                            </strong>
                                            <div class="switcher-options">
                                                <div class="switcher-currency-trigger">
                                                    <a class="currency-trigger" href="{{ route('profile-edit') }}">Change Profile</a>
                                                    <a class="currency-trigger" href="">Logout</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <!-- Start Mobile Menu -->
                <div class="row d-none">
                    <div class="col-lg-12 d-none">
                        <nav class="mobilemenu__nav">
                            <ul class="meninmenu">
                                <li><a href="index.html">Home</a></li>
                                <li><a href="#">Pages</a>
                                    <ul>
                                        <li><a href="about.html">About Page</a></li>
                                        <li><a href="portfolio.html">Portfolio</a>
                                            <ul>
                                                <li><a href="portfolio.html">Portfolio</a></li>
                                                <li><a href="portfolio-details.html">Portfolio Details</a></li>
                                            </ul>
                                        </li>
                                        <li><a href="my-account.html">My Account</a></li>
                                        <li><a href="cart.html">Cart Page</a></li>
                                        <li><a href="checkout.html">Checkout Page</a></li>
                                        <li><a href="wishlist.html">Wishlist Page</a></li>
                                        <li><a href="error404.html">404 Page</a></li>
                                        <li><a href="faq.html">Faq Page</a></li>
                                        <li><a href="team.html">Team Page</a></li>
                                    </ul>
                                </li>
                                <li><a href="shop-grid.html">Shop</a>
                                    <ul>
                                        <li><a href="shop-grid.html">Shop Grid</a></li>
                                        <li><a href="single-product.html">Single Product</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a>
                                    <ul>
                                        <li><a href="blog.html">Blog Page</a></li>
                                        <li><a href="blog-details.html">Blog Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <!-- End Mobile Menu -->
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
                    <input type="text" placeholder="Search entire store here...">
                    <div class="action">
                        <a href="#"><i class="zmdi zmdi-search"></i></a>
                    </div>
                </div>
            </form>
            <div class="close__wrap">
                <span>close</span>
            </div>
        </div>
        <!-- End Search Popup -->
