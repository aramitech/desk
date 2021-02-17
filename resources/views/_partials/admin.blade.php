<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('admin-dashboard')}}" class="dropdown-toggle no-arrow {{ (request()->is('admin/dashboard')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="{{ route('users')}}" class="dropdown-toggle no-arrow {{ (request()->is('user*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Users</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="{{ route('company')}}" class="dropdown-toggle no-arrow {{ (request()->is('company*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Company</span>
        </a>
    </li>
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Dropdown</span>
        </a>
        <ul class="submenu">
            <li><a href="#">Item 1</a></li>
            <li><a href="#">Item 2</a></li>
        </ul>
    </li>
</ul>