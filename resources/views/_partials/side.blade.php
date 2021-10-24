<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('home')}}" class="dropdown-toggle no-arrow {{ (request()->is('home')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
        </a>
    </li>


    @if ( Auth::user()->records_bookmarkers_r == 'Allowed' )
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
    @if ( Auth::user()->records_bookmarkers == 'Allowed' || Auth::user()->records_public_lotery == 'Allowed' || Auth::user()->records_public_gaming == 'Allowed' )
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Company Entry</span>
        </a>
        <ul class="submenu">
        @if ( Auth::user()->records_bookmarkers == 'Allowed' )

        <li class="dropdown">
        <a href="{{ route('company.bookmarkersusers','BookMarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('bookmarkerscompany*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">BookMarkers</span>
        </a>
    </li>
    @else    
     @endif
    @if (Auth::user()->public_lottery_companies_status == 'Allowed')

    <li class="dropdown">
        <a href="{{ route('company.publiclotteryuser','publiclotteryuser')}}" class="dropdown-toggle no-arrow {{ (request()->is('publiclotteryuser*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
        </a>
    </li>
    @else   
     @endif
    @if (Auth::user()->public_gaming_companies_status == 'Allowed' )
    <li class="dropdown">
        <a href="{{ route('company.publicgaminguser','Publicgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('publicgamingcompany*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
        </a>
    </li>
    @else   
     @endif
        </ul>
    </li>
    @else   
                                    @endif


    @if ( Auth::user()->access_registry == 'Allowed' )
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Registry Entry</span>
        </a>
        <ul class="submenu">
        @if ( Auth::user()->access_file_registry == 'Allowed' )
        <li class="dropdown">
        <a href="{{ route('registryuser')}}" class="dropdown-toggle no-arrow {{ (request()->is('registry*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Registry</span>
        </a>
    </li>
    @else   @endif
    @if ( Auth::user()->assign_file_registry == 'Allowed' )
    <li class="dropdown">
        <a href="{{ route('filingregistryuser')}}" class="dropdown-toggle no-arrow {{ (request()->is('filingregistryuser*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Filing</span>
        </a>
    </li>
    @else   @endif
    @if ( Auth::user()->assign_task == 'Allowed' )
    <li class="dropdown">
        <a href="{{ route('assignregistryuser')}}" class="dropdown-toggle no-arrow {{ (request()->is('assignregistryuser*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Assign </span>
        </a>
    </li>
    @else   @endif
        </ul>
    </li>

        @else   @endif
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
                                        <a href="{{ route('taskindexreplied')}}" class="dropdown-toggle no-arrow {{ (request()->is('taskindex*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Task</span>
                                        </a>
                                    </li>  

                                    <!-- <li class="dropdown">
                                        <a href="{{ route('taskindexreplied')}}" class="dropdown-toggle no-arrow {{ (request()->is('taskindexreplied*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Seen Task </span>
                                        </a>
                                    </li>                               -->
                                    


                                  
                                    @if ( Auth::user()->user_types_id == '1' )
       <li class="dropdown">
        <a href="{{ route('users_admin')}}" class="dropdown-toggle no-arrow {{ (request()->is('user*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Users</span>
        </a>
    </li>
    @else   
                                    @endif


</ul>