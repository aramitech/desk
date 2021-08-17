<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('home')}}" class="dropdown-toggle no-arrow {{ (request()->is('home')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
        </a>
    </li>


    @if ( Auth::user()->bookmarkersstatus == 'Allowed' )
    <li class="dropdown">
        <a href="{{ route('bookmarkers.userindex')}}" class="dropdown-toggle no-arrow {{ (request()->is('bookmarkers.userindex*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">BookMarkers</span>
        </a>
    </li>
                                     @else   
                                    @endif
                                    @if ( Auth::user()->publiclotterystatus == 'Allowed' )
                                    <li class="dropdown">
                                        <a href="{{ route('userpubliclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('userpubliclottery*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
                                        </a>
                                    </li>                                   
                                     @else   
                                    @endif

   
                                    @if ( Auth::user()->publicgamingstatus == 'Allowed' )
                                    <li class="dropdown">
                                        <a href="{{ route('publicgaminguserindex')}}" class="dropdown-toggle no-arrow {{ (request()->is('publicgaminguserindex*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
                                        </a>
                                    </li>
                                    @else   
                                    @endif

 
                                    @if ( Auth::user()->sendsms_status == 'Allowed' )
                                    <li class="dropdown">
        <a href="{{ route('sendsms')}}" class="dropdown-toggle no-arrow {{ (request()->is('sendsms*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Send SMS</span>
        </a>
    </li>
    @else   
                                    @endif
    @if ( Auth::user()->bookmarkersshop_status == 'Allowed' )
    <li class="dropdown">
        <a href="{{ route('shop')}}" class="dropdown-toggle no-arrow {{ (request()->is('shop*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Bookmarkers Shop</span>
        </a>
    </li>
    @else   
                                    @endif


    @if ( Auth::user()->companies_status == 'Allowed' )
    <li> <a href="{{ route('company.bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('company.bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext"> Company</span>
        </a></li>
        @else   

        
                                    @endif
                                    @if ( Auth::user()->user_accounts_status == 'Allowed' )
                                   {{-- <li class="dropdown">
                                        <a href="{{ route('accounts')}}" class="dropdown-toggle no-arrow {{ (request()->is('user_accounts_status*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Accounts</span>
                                        </a>
                                    </li>  --}}
                                    
                                    
                                    <li class="dropdown">
                                        <a href="{{ route('accountsusers')}}" class="dropdown-toggle no-arrow {{ (request()->is('user_accounts_accountsusers*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Accounts</span>
                                        </a>
                                    </li> 
                                     @else   
                                    @endif
                                 

                                <li class="dropdown">
                                        <a href="{{ route('taskindex')}}" class="dropdown-toggle no-arrow {{ (request()->is('taskindex*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Task</span>
                                        </a>
                                    </li>  

                                    <li class="dropdown">
                                        <a href="{{ route('taskindexreplied')}}" class="dropdown-toggle no-arrow {{ (request()->is('taskindexreplied*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Seen Task </span>
                                        </a>
                                    </li>                              
                                    
</ul>