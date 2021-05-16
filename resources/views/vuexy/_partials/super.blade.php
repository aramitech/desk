<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('super-admin-dashboard')}}" class="dropdown-toggle no-arrow {{ (request()->is('super-admin/dashboard')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
        </a>
    </li>


    <li class="dropdown">
        <a href="{{ route('admin_users')}}" class="dropdown-toggle no-arrow {{ (request()->is('admin_users*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Admin</span>
        </a>
    </li>

    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Reports</span>
        </a>
        <ul class="submenu">
 
            
    <li class="dropdown">
        <a href="{{ route('return_form_rports.publiclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('return_form_rports/publiclottery*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Bookmarkers Report</span>
        </a>
    </li>
           
            
    <li class="dropdown">
        <a href="{{ route('return_form_rports.Publicgamings')}}" class="dropdown-toggle no-arrow {{ (request()->is('return_form_rports/Publicgamings*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming Report</span>
        </a>
    </li>
         
            
    <li class="dropdown">
        <a href="{{ route('return_form_rports.bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('return_form_rports/bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery Report</span>
        </a>
    </li>
        </ul>
    </li>
</ul>
