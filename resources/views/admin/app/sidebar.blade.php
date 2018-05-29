<!-- main sidebar -->
<aside id="sidebar_main">
    <div class="sidebar_main_header">
        <div class="sidebar_logo">
            <a href="index.html" class="sSidebar_hide sidebar_logo_large"><img src="{{ URL::asset('assets/img/admin-logo.png') }}"></a>
            <a href="index.html" class="sSidebar_show sidebar_logo_small"><img src="{{ URL::asset('assets/img/admin-logo.png') }}"></a>
        </div>
    </div>
    <div class="menu_section">
        <ul>
            <li class="{{ Request::is('admin/dashboard') ? 'current_section' : null }}">
                <a href="{{ url('admin/dashboard') }}">
                    <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                    <span class="menu_title">{{ __('side_home') }}</span>
                </a>
            </li>
            <li class="submenu_trigger">
                <a href="#">
                    <span class="menu_icon"><i class="material-icons">&#xE8B8;</i></span>
                    <span class="menu_title">{{ __('side_setting') }}</span>
                </a>
                <ul>
                    <li class="{{ Request::is('admin/attributes') ? 'act_item' : null }}"><a href="{{ url('admin/attributes') }}">{{ __('side_attr') }}</a></li>
                    <li class="{{ Request::is('admin/geography') ? 'act_item' : null }}"><a href="{{ url('admin/geography') }}">{{ __('side_geo') }}</a></li>
					<li class="{{ Request::is('admin/place') ? 'act_item' : null }}"><a href="{{ url('admin/place') }}">{{ __('side_place') }}</a></li>
                    <li class="{{ Request::is('admin/import') ? 'act_item' : null }}"><a href="{{ url('admin/import') }}">{{ __('side_import') }}</a></li>
                    <li class="{{ Request::is('admin/logs') ? 'act_item' : null }}"><a href="{{ url('admin/logs') }}">{{ __('side_log') }}</a></li>
                    <li class="{{ Request::is('admin/settings') ? 'act_item' : null }}"><a href="{{ url('admin/settings') }}">{{ __('side_setting') }}</a></li>
                </ul>
            </li>
        </ul>
    </div>
</aside><!-- main sidebar end -->