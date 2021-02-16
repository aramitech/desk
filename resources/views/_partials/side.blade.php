<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('home')}}" class="dropdown-toggle no-arrow {{ (request()->is('home')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
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