<header class="app-header">
    <a class="app-header__logo" href="{{ route('book.index') }}">{{ trans('admin.admin') }}</a>
    <!-- Sidebar toggle button-->
    <a class="app-sidebar__toggle" href="#" data-toggle="sidebar"></a>
    <!-- Navbar Right Menu-->
    <ul class="app-nav">
        <li class="app-search">
            <input class="app-search__input" type="search" placeholder="{{ trans('admin.search') }}">
            <button class="app-search__button"><i class="fa fa-search"></i></button>
        </li>
        <!--Notification Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-bell-o fa-lg"></i><span class="badge badge-danger">{{ Auth::user()->unreadNotifications->count() }}</span></a>
            <ul class="app-notification dropdown-menu dropdown-menu-right">
                <li class="app-notification__title">
                    {{ trans('admin.you_have') }}
                    {{ Auth::user()->unreadNotifications->count() }}
                    {{ trans('admin.new_notice') }}
                </li>
                @foreach ($notifications as $notice)
                    <div class="app-notification__content">
                        <li>
                            <a class="app-notification__item {{ ($notice->read_at == null) ? 'bg bg-primary' : ''}}"
                                href="{{ route('notification.detail',
                                    [
                                    'idRequire' => getDataFromAdminNotification($notice)['idRequire'],
                                    'idNotice' => $notice->id,
                                    ]) }}">
                                <span class="app-notification__icon"><span class="fa-stack fa-lg"><i class="fa fa-circle fa-stack-2x text-primary"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span></span>
                                <div>
                                    <p class="app-notification__message">
                                        <b>{{ getDataFromAdminNotification($notice)['user'] }}</b>
                                        {{ trans('admin.sent_request_add_new_book') }}
                                        <b><i>'{{ getDataFromAdminNotification($notice)['nameBook'] }}'</i></b>
                                    </p>
                                    <p class="app-notification__meta">{{ $notice->created_at }}</p>
                                </div>
                            </a>
                        </li>
                    </div>
                @endforeach
                <li class="app-notification__footer"><a href="{{ route('notification.all') }}">{{ trans('admin.see_all_notice') }}</a></li>
            </ul>
        </li>
  <!-- User Menu-->
        <li class="dropdown">
            <a class="app-nav__item" href="#" data-toggle="dropdown"><i class="fa fa-user fa-lg"></i></a>
            <ul class="dropdown-menu settings-menu dropdown-menu-right">
                <li><a class="dropdown-item" href="javascript:void(0)"><i class="fa fa-user fa-lg"></i>{{ Auth::user()->name }}</a></li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out fa-lg">{{ __('Logout') }}</i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</header>
