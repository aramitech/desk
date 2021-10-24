<ul id="accordion-menu">
    <li class="dropdown">
        <a href="{{ route('home')}}" class="dropdown-toggle no-arrow {{ (request()->is('home')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-dashboard"></span><span class="mtext">Dashboard</span>
        </a>
    </li>


    @if ( Auth::user()->records_bookmarkers_r == 'Allowed' )
    <li class="dropdown">
        <a href="{{ route('bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">BookMarkers</span>
        </a>
    </li>
                                     @else   
                                    @endif
                                    @if ( Auth::user()->publiclotterystatus == 'Allowed' )
                                    <li class="dropdown">
                                        <a href="{{ route('publiclottery')}}" class="dropdown-toggle no-arrow {{ (request()->is('publiclottery*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Lottery</span>
                                        </a>
                                    </li>                                   
                                     @else   
                                    @endif

   
                                    @if ( Auth::user()->publicgamingstatus == 'Allowed' )
                                    <li class="dropdown">
                                        <a href="{{ route('publicgaming')}}" class="dropdown-toggle no-arrow {{ (request()->is('publicgaming*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Public Gaming  </span>
                                        </a>
                                    </li>
                                    @else   
                                    @endif

 


                                    @if ( Auth::user()->access_registry == 'Allowed' )
    <li class="dropdown">
        <a href="javascript:;" class="dropdown-toggle">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Registry Entry</span>
        </a>
        <ul class="submenu">
        <li class="dropdown">
        <a href="{{ route('registryuser')}}" class="dropdown-toggle no-arrow {{ (request()->is('registry*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Registry</span>
        </a>
    </li>

    <li class="dropdown">
        <a href="{{ route('filingregistryuser')}}" class="dropdown-toggle no-arrow {{ (request()->is('filingregistryuser*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Filing</span>
        </a>
    </li>
    
    <li class="dropdown">
        <a href="{{ route('assignregistryuser')}}" class="dropdown-toggle no-arrow {{ (request()->is('assignregistryuser*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Assign </span>
        </a>
    </li>
        </ul>
    </li>

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

                                    <!-- <li class="dropdown">
                                        <a href="{{ route('taskindexreplied')}}" class="dropdown-toggle no-arrow {{ (request()->is('taskindexreplied*')) ? 'active' : '' }}">
                                            <span class="micon icon-copy ti-user"></span><span class="mtext">Seen Task </span>
                                        </a>
                                    </li>                               -->
                                    


       



                                    @if ( Auth::user()->sendsms_status == 'Allowed' )
                                    <li class="dropdown">
        <a href="{{ route('sendsms')}}" class="dropdown-toggle no-arrow {{ (request()->is('sendsms*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext">Send SMS</span>
        </a>
    </li>
    @else   
                                    @endif



    @if ( Auth::user()->companies_status == 'Allowed' )
    <li> <a href="{{ route('company.bookmarkers')}}" class="dropdown-toggle no-arrow {{ (request()->is('company.bookmarkers*')) ? 'active' : '' }}">
            <span class="micon icon-copy ti-user"></span><span class="mtext"> Company</span>
        </a></li>
        @else  @endif

</ul>