<!-- Sidebar menu-->
<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
<aside class="app-sidebar">
    <div class="app-sidebar__user">
        <img class="app-sidebar__user-avatar" src="">
        <div>
            <p class="app-sidebar__user-name"></p>
            <p class="app-sidebar__user-designation"></p>
        </div>
    </div>
    <ul class="app-menu">
        <li>
            <a class="app-menu__item active" href="{{ route('dashboard') }}"><i class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">{{ trans('admin.home') }}</span></a>
        </li>
        <li class="treeview">
            <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop"></i><span class="app-menu__label">{{ trans('admin.manage_book') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li>
                    <a class="treeview-item" href="{{ route('book.index') }}"><i class="icon fa fa-circle-o"></i>{{ trans('admin.list') }}</a>
                </li>
                @permission('book-create')
                    <li>
                        <a class="treeview-item" href="{{ route('book.create') }}"><i class="icon fa fa-circle-o"></i>{{ trans('admin.create') }}</a>
                    </li>
                @endpermission
                <li>
                    <a class="treeview-item" href="" target="_blank" rel="noopener"><i class="icon fa fa-circle-o"></i> {{ trans('admin.require_newbook') }}</a>
                </li>
            </ul>
        </li>
        @permission('manage-users')
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">{{ trans('admin.manage_user') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a class="treeview-item" href="{{ route('user.index') }}"><i class="icon fa fa-circle-o"></i>{{ trans('admin.list') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('user.create') }}" class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>{{ trans('admin.create') }}</a>
                    </li>
                </ul>
            </li>
        @endpermission
        @permission('manage-roles')
            <li class="treeview">
                <a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-edit"></i><span class="app-menu__label">{{ trans('admin.manage_roles') }}</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li>
                        <a href="{{ route('role.index') }}" class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>{{ trans('admin.list') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('role.create') }}" class="treeview-item" href="bootstrap-components.html"><i class="icon fa fa-circle-o"></i>{{ trans('admin.create') }}</a>
                    </li>
                </ul>
            </li>
        @endpermission
    </ul>
</aside>
