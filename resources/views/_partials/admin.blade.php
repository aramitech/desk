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
        <a href="{{ route('categorytypes')}}" class="dropdown-toggle no-arrow {{ (request()->is('categorytypes*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Category Types</span>
        </a>
    </li>
    
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Company</span>
        </a>
        <ul class="submenu">
       <li> <a href="{{ route('company.bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('company.bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext"> Company</span>
        </a></li>
        <!-- <li> <a href="{{ route('company.publickgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('company.publickgaming*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming Company</span>
        </a></li>
        <li> <a href="{{ route('company')}}" class="dropdown-toggle no-arrow {{ (request()->is('company*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery Company</span>
        </a></li> -->
            
        </ul>
    </li>
   
   
   
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Books</span>
        </a>
        <ul class="submenu">
        <li class="dropdown">
        <a href="{{ route('adminbookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('adminbookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">BookMarkers</span>
        </a>
    </li>

    <li class="dropdown">
        <a href="{{ route('adminpubliclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('adminpubliclottery*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
        </a>
    </li>
    
    <li class="dropdown">
        <a href="{{ route('adminpublicgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('adminpublicgaming*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
        </a>
    </li>
        </ul>
    </li>



    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Reports</span>
        </a>
        <ul class="submenu">
            <li class="dropdown">
                <a href="{{ route('reports')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports*')) ? 'active' : '' }}">
                    <span class="micon icon-copy ti-user"></span><span class="mtext">Bookmarkers Companies</span>
                </a>
            </li>
            <li class="dropdown">
                <a href="{{ route('reports.company-ggr')}}" class="dropdown-toggle no-arrow {{ (request()->is('reports.company-ggr*')) ? 'active' : '' }}">
                    <span class="micon icon-copy ti-user"></span><span class="mtext">Company GGR</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="dropdown">
        <a href="{{ route('indexpubliclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('indexpubliclottery*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
        </a>
    </li>
    
    <li class="dropdown">
        <a href="{{ route('indexpublicgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('indexpublicgaming*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
        </a>
    </li>
        </ul>
    </li>


    <li class="dropdown">
        <a href="{{ route('useractivitylogs')}}" class="dropdown-toggle no-arrow {{ (request()->is('useractivitylogs*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Acctivity Logs</span>
        </a>
    </li>

</ul>